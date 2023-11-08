<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\Llibre;
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
        $comanda->estat = 'Pendent';
        $comanda->user_id = $idUsuari;

        $llibresComanda = $request->input('carrito');
        $lineesComanda = [];

        // Insertar valors a la taula llibre_comanda
        if (is_array($llibresComanda) && count($llibresComanda) > 0) {
            DB::beginTransaction(); // Iniciar transacció

            try {
                // Per cada objecte de l'array, popular array 'lineesComanda' amb la quantitat i el preu rebuts
                foreach ($llibresComanda as $llibre) {
                    if ($llibre['quantitat']<=0) {
                        return response()->json([
                            'status' => 'error', 
                            'message' => 'Quantitat no pot ser menor o igual a zero'
                        ]);
                    }

                    $llibreInfo = DB::table('llibres')->where('id', $llibre['id'])->first();

                    if (!$llibreInfo || $llibreInfo->stock < $llibre['quantitat']) {
                        throw new \Exception('Stock insuficient per al llibre ID: ' . $llibre['id']);
                    }

                    DB::table('llibres')
                        ->where('id', $llibre['id'])
                        ->decrement('stock', $llibre['quantitat']);

                    $lineesComanda[$llibre['id']] = [
                        'quantitat' => $llibre['quantitat'], 
                        'preu' => $llibreInfo->preu, 
                    ];
                }

                $comanda->save();
                $comanda->llibres()->attach($lineesComanda);

                DB::commit(); // Confirmar canvis si tot va bé

                $this->sendMail($comanda->id, 0);
                return response()->json($comanda);
            } catch (\Exception $e) {
                DB::rollBack(); // Desfer canvis en cas d'error
                return response()->json([
                    'status'=> 'error',
                    'message'=> $e->getMessage()   
                ], 422); 
            }
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
        $comanda = Comanda::find($id);
            
        
        return $comanda;
        
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //busca comanda
        $comanda = Comanda::find($id);
        $usuari = $request->user();

        //si troba la comanda...
        if($comanda){
            if($usuari->id != $comanda->user_id){
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Usuari no coincideix!',
                ]);
            }
    
            $llibresComanda = $request->input('carrito');
            $lineesComanda = [];
    
            if (is_array($llibresComanda) && count($llibresComanda) > 0) {
                DB::beginTransaction();

                try {
                    $llibresActuals = $comanda->llibres; // Recupera llibres actuals de la comanda

                    foreach ($llibresActuals as $llibreActual) {
                        // Incrementa el stock dels llibres eliminats de la comanda
                        Llibre::find($llibreActual->id)->increment('stock', $llibreActual->pivot->quantitat);
                    }

                    $comanda->llibres()->detach(); // Elimina les relacions actuals

                    foreach ($llibresComanda as $llibre) {
                        if ($llibre['quantitat'] <= 0) {
                            throw new \Exception('Quantitat no pot ser menor o igual a zero');
                        }
    
                        $llibreBackEnd = Llibre::find($llibre['id']);
    
                        if (!$llibreBackEnd || $llibreBackEnd->stock < $llibre['quantitat']) {
                            throw new \Exception('Stock insuficient per al llibre ID: ' . $llibre['id']);
                        }
    
                        $llibreBackEnd->decrement('stock', $llibre['quantitat']);
    
                        $lineesComanda[$llibreBackEnd->id] = [
                            'quantitat' => $llibre['quantitat'],
                            'preu' => $llibreBackEnd->preu,
                        ];
                    }
    
                    $comanda->llibres()->attach($lineesComanda);
    
                    DB::commit();
    
                    return response()->json($comanda);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return response()->json([
                        'status' => 'error',
                        'message' => $e->getMessage()
                    ], 422);
                }
            }

            // Si no s'ha enviat ningun array, retorna error
            return response()->json([
                'status' => 'error',
                'message' => 'No hi han elements a la comanda!',
            ], 422);
        }

        // Si no es troba la comanda, retorna error
        return response()->json([
            'status' => 'error',
            'message' => 'No existeix la comanda!'
        ], 404);
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