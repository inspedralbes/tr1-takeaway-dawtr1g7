<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;

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
}
