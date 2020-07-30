<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = Categoria::all();
        return view('categoriaIndex', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriaCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $c = new Categoria();

        $c->nombre = $request->nombre;
        $c->descripcion = $request->descripcion;

        $c->save();
        return redirect('/Categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($idCategoria)
    {
        //
        //Encontramos la categoria con un determinado id
        $categoria = Categoria::findOrFail($idCategoria);
        return view('categoriaEdit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idCategoria)
    {
        //
        $categoriaUpdate = Categoria::findOrFail($idCategoria);

        $categoriaUpdate -> nombre = $request -> nombre;
        $categoriaUpdate -> descripcion = $request -> descripcion;

        $categoriaUpdate -> save();
        return redirect('/Categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCategoria)
    {
        //
        $c = Categoria::findOrFail($idCategoria);
        $c -> delete();
        return redirect('/Categorias');
    }
}
