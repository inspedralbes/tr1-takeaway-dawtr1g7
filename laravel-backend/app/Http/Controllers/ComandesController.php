<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;

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
        $comanda = new Comanda();
        $comanda->estat = 'En preparació';

        $llibresComanda = $request->input('carrito');
        $lineesComanda = [];

        // Insertar valors a la taula llibre_comanda
        if (is_array($llibresComanda) && count($llibresComanda) > 0) {
            // Per cada objecte de l'array, popular array 'lineesComanda' amb la quantitat i el preu rebuts
            foreach ($llibresComanda as $llibre) {
                $lineesComanda[$llibre['id']] = [
                    'quantitat' => $llibre['quantitat'],
                    'preu'=> $llibre['preu'],
                ];
            }
            $comanda->save();
            $comanda->llibres()->attach($lineesComanda);
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

    // MÈTODES DE LA PART D'ADMINISTRACIÓ
    public function adminIndex()
    {
        $comandes = DB::table('comandas')
            ->join('llibre_comanda', 'comandas.id', '=', 'llibre_comanda.comanda_id')
            ->join('llibres', 'llibres.id', '=', 'llibre_comanda.llibre_id')
            ->select('comandas.id', 'comandas.estat', DB::raw('GROUP_CONCAT(llibres.titol SEPARATOR \', \') as llibres'))
            ->groupBy('comandas.id', 'comandas.estat')    
            ->get();

     return view('comandes.index', ['comandes' => $comandes]);
    }

    public function adminShow($id) {
        $comanda = Comanda::find($id);
        return view('comandes.modificar', ['comanda' => $comanda]);
    }

    public function adminUpdate(Request $request, $id) {
        $comanda = Comanda::find($id);
        $comanda->estat = $request->estat;
        $comanda->save();

        $direccio_mail = DB::table('comandas')
            ->join('users', 'comandas.user_id', '=', 'users.id')
            ->where('comandas.id', '=', $id)
            ->select('users.email')
            ->get();
        $mail = new MailController;
        $mail->sendMail($direccio_mail);

        return redirect()->route('view-modificar-comanda', ['id' => $comanda->id])->with('success', 'Estat comanda actualitzat correctament');
    }
}

