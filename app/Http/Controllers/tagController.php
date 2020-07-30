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
}
