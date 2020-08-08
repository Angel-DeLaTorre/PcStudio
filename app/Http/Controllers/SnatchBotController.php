<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SnatchBotController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->path();
        
        $bot = DB::table('producto') 
                    ->join('imagenProducto', 'producto.idProducto', '=', 'imagenProducto.idProducto')
                    ->select('producto.idProducto','producto.titulo','producto.descripcion','producto.marca','producto.precioVenta', 
                            'imagenProducto.imagenUrl')
                    ->where('producto.idCategoria', '=', $url)
                    ->get();
        
        return view('VistaSnatchBot', compact('bot'));
    }
}
