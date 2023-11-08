<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Llibre;
use Illuminate\Support\Facades\DB;

class LlibresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Llibre::with('categoria')->get();
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
        $llibres = DB::table('llibres')->get();

    return view('llibres.index', ['llibres' => $llibres]);
    }

    public function adminFiltra(Request $request)
    {
        $llibres = DB::table('llibres')
        ->where('id', 'like', '%' . $request->filtre . '%')        
        ->orWhere('titol', 'like', '%' . $request->filtre . '%')
        ->orWhere('autor', 'like', '%' . $request->filtre . '%')
        ->orWhere('isbn', 'like', '%' . $request->filtre . '%')
        ->get();

    return view('llibres.index', ['llibres' => $llibres]);
    }

    public function adminStore(Request $request)
    {
        
            $request->validate([
                'titol' => 'required',
                'autor' => 'required',
                'descripcio' => 'required',
                'editorial' => 'required',
                'any' => 'required',
                'preu' => 'required',
                'isbn' => 'required',
                'categoria' => 'required',
                'portada' => 'required'
            ]);
    
            $llibre = new Llibre;
            $llibre->titol = $request->titol;
            $llibre->autor = $request->autor;
            $llibre->descripcio = $request->descripcio;
            $llibre->editorial = $request->editorial;
            $llibre->any = $request->any;
            $llibre->preu = $request->preu;
            $llibre->isbn = $request->isbn;
            $llibre->categoria_id = $request->categoria;
            $llibre->img_url = $request->portada;
            
            /*if ($request->hasfile('imatge')) {
                $file = $request->file('imatge');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('fotos_esdeveniments/', $filename);
                $esdev->imatge = $filename;
            }*/
            $llibre->save();
    
            return redirect()->route('view-afegir-llibre')->with('success', 'Llibre afegit correctament');
    }

    public function adminShow($id) {
        $llibre = Llibre::find($id);
        return view('llibres.modificar', ['llibre' => $llibre]);
    }

    public function adminUpdate(Request $request, $id) {

        $request->validate([
            'titol' => 'required',
            'autor' => 'required',
            'descripcio' => 'required',
            'editorial' => 'required',
            'any' => 'required',
            'preu' => 'required',
            'isbn' => 'required',
            'categoria' => 'required',
            'portada' => 'required'
        ]);
        
        $llibre = Llibre::find($id);
        $llibre->titol = $request->titol;
        $llibre->autor = $request->autor;
        $llibre->descripcio = $request->descripcio;
        $llibre->editorial = $request->editorial;
        $llibre->any = $request->any;
        $llibre->preu = $request->preu;
        $llibre->isbn = $request->isbn;
        $llibre->categoria_id = $request->categoria;
        $llibre->img_url = $request->portada;
        $llibre->save();

        return redirect()->route('view-modificar-llibre', ['id' => $llibre->id])->with('success', 'Llibre actualitazat correctament');
    }

    public function adminDelete($id) {
        $llibre = Llibre::find($id);
        $llibre->delete();

        return redirect()->route('llibres')->with('success', 'Llibre eliminat correctament'); 
    }
}

