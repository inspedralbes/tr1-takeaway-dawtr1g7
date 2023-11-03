<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $categories = DB::table('categorias')->get();

    return view('categories.index', ['categories' => $categories]);
    }

    public function adminStore(Request $request)
    {
        
        $request->validate([
            'nom' => 'required'
        ]);
    
        $categoria = new Categoria;
        $categoria->nom = $request->nom;
        $categoria->save();
    
        return redirect()->route('view-afegir-categoria')->with('success', 'Categoria afegida correctament');
    }

    public function adminShow($id) {
        $categoria = Categoria::find($id);
        return view('categories.modificar', ['categoria' => $categoria]);
    }
    

    public function adminUpdate(Request $request, $id) {

        $request->validate([
            'nom' => 'required'
        ]);

        $categoria = Categoria::find($id);
        $categoria->nom = $request->nom;
        $categoria->save();

        return redirect()->route('view-modificar-categoria', ['id' => $categoria->id])->with('success', 'Categoria actualitazada correctament');
    }

    public function adminDelete($id) {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categories')->with('success', 'Categoria eliminada correctament'); 
    }
}