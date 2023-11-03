<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\QrCodeontroller;
use App\Http\Controllers\SendMailPDFController;

class ComandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comandes = Comanda::with('llibres')->get();

        return response()->json($comandes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $usuari = $request->user();
        $idUsuari = $usuari->id;

        $comanda = new Comanda();
        $comanda->estat = 'En preparació';
        $comanda->user_id = $idUsuari;

        $llibresComanda = $request->input('carrito');
        $lineesComanda = [];

        // Insertar valors a la taula llibre_comanda
        if (is_array($llibresComanda) && count($llibresComanda) > 0) {
            // Per cada objecte de l'array, popular array 'lineesComanda' amb la quantitat i el preu rebuts
            foreach ($llibresComanda as $llibre) {
                $lineesComanda[$llibre['id']] = [
                    'quantitat' => $llibre['quantitat'],
                    'preu' => $llibre['preu'],
                ];
            }
            $comanda->save();
            $comanda->llibres()->attach($lineesComanda);
            $this->sendMail($comanda->id, 0);
            return response()->json($comanda);
        }

        // Si no s'a enviat ningun array, retorna error
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => 'No hi han elements a la comanda!'
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(string $userId)
    {
        $comandes = Comanda::with('llibres')->where("user_id", $userId)->get();

        if ($comandes->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'L\'usuari no ha realitzat comandes',
            ], 404); // 404 Not Found
        }

        // Afegir 'quantitat' a cada llibre
        $comandes->each(function ($comanda) {
            $comanda->llibres->each(function ($llibre) {
                $llibre->quantitat = $llibre->pivot->quantitat;
            });
        });

        return $comandes;
    }

    // MÈTODES DE LA PART D'ADMINISTRACIÓ
    public function adminIndex()
    {
        $comandes = DB::table('comandas')
            ->join('llibre_comanda', 'comandas.id', '=', 'llibre_comanda.comanda_id')
            ->join('llibres', 'llibres.id', '=', 'llibre_comanda.llibre_id')
            ->select('comandas.id', 'comandas.estat', 'llibres.titol', 'llibres.preu')
            ->get();

        $num_llibres = DB::table('llibre_comanda')
            ->select('llibre_comanda.comanda_id', DB::raw('count(*) as total'))
            ->groupBy('llibre_comanda.comanda_id')    
            ->get();

     return view('comandes.index', ['comandes' => $comandes], ['num_llibres' => $num_llibres]);

    }

    public function adminShow($id)
    {
        $comanda = Comanda::find($id);
        return view('comandes.modificar', ['comanda' => $comanda]);
    }

    public function adminUpdate(Request $request, $id)
    {
        $comanda = Comanda::find($id);
        $comanda->estat = $request->estat;
        $comanda->save();
        $this->sendMail($id, 1);

        /*$contingut_mail = DB::table('comandas')
            ->join('users', 'comandas.user_id', '=', 'users.id')
            ->join('llibre_comanda', 'comandas.id', '=', 'llibre_comanda.comanda_id')
            ->join('llibres', 'llibres.id', '=', 'llibre_comanda.llibre_id')
            ->where('comandas.id', '=', $id)
            ->select('comandas.id', 'comandas.estat', 'users.name', 'users.email', DB::raw("GROUP_CONCAT(llibres.titol SEPARATOR '\r\n') as llibres"))
            ->groupBy('comandas.id', 'comandas.estat', 'users.name', 'users.email')
            ->get();*/

        //$qr = new QrCodeController;
        //return view("qrcode",['contingut' => $contingut_mail]);

        return redirect()->route('view-modificar-comanda', ['id' => $comanda->id])->with('success', 'Estat comanda actualitzat correctament');

    }

    public function sendMail($id, $action_code)
    {
        $contingut_mail = DB::table('comandas')
        ->join('users', 'comandas.user_id', '=', 'users.id')
        ->join('llibre_comanda', 'comandas.id', '=', 'llibre_comanda.comanda_id')
        ->join('llibres', 'llibres.id', '=', 'llibre_comanda.llibre_id')
        ->where('comandas.id', '=', $id)
        ->select('comandas.id', 'comandas.estat', 'users.name', 'users.email', 'llibres.titol', 'llibre_comanda.preu', 'llibre_comanda.quantitat')
        ->get();

        $mail = new SendMailPDFController;
        $mail->sendMailWithPDF($contingut_mail, $action_code);
    }
}

