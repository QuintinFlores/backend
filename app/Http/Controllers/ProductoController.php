<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //decalro mis variables
        $q = isset($request->q)?$request->q:'';
        $limit = isset($request->limit)?$request->limit:10;

        if($q){
            $productos = Producto::where("nombre", "like", "%$q%")
                                    ->orderBy("id", "desc")
                                    ->paginate($limit);
        }else {
            $productos = Producto::orderBy("id","desc")->paginate($limit);
        }
        return response()->json($productos, 200);
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
}
