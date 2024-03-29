<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        //
        $categorias = Categoria::get();
        return response()->json($categorias, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate([
            "nombre"=> "required|unique:categorias|min:3|max:30"
        ]);
        //guardar
        $categoria = new categoria();
        $categoria->nombre = $request->nombre;
        $categoria->detalle = $request->detalle;
        $categoria->save();

        return response()->json(["message" => "Categoria Registrada"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
         return response()->json($categoria, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validar 
        $request->validate([
            "nombre"=> "required|unique:categorias,nombre,$id|min:3|max:30"
        ]);
        categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->detalle = $request->detalle;
        $categoria->update();

        retunr response()->json(["mesaje" => "Ccategoria Actualizada"], 201);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //eliminacino
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(["message" => "Categoria Eliminada"], 200);
    }
}
