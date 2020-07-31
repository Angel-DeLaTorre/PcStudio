<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tag;
use App\Http\Requests;
class tagController extends Controller
{
    public function vista(){
        return view('agregarTag');
    }

    public function create(Request $request){
        $tag = new tag();

        $tag -> tag = $request -> tag;
        $tag -> descripcion = $request -> descripcion;
        $tag -> save();

        return redirect('/create');
    }

    public function read(Request $request){
        $tag = tag::all();
        return view('listaTag',['lista'=>$tag]);
    }

    public function edit(tag $tag)
    {
        return view('actualizarTag', [
            'tag' => $tag
        ]);
    }

    public function update(tag $tag)
    {
        $tag->update([
            'tag' => request('tag'),
            'descripcion' => request('descripcion'),
        ]);

        return redirect()->route('listaTag');
    }

    public function eliminar(tag $tag)
    {
        return view('eliminarTag', [
            'tag' => $tag
        ]);
    }

    public function delete(tag $tag){
        
        $tag->delete();

        return redirect()->route('listaTag');
    }
}
