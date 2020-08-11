<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SnatchBotController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->path();
        
        $bot = DB::table('imagenproducto')
        ->join('producto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
        ->select('imagenproducto.imagenUrl','imagenproducto.idProducto','producto.titulo',
                    'producto.descripcion', 'producto.marca','producto.precioVenta', 
                    'producto.cantidad', 'producto.descuentoVenta')
        ->where('idCategoria', '=', $url)
        ->get();
        
        return view('producto.busqueda', compact('bot'));
        //print_r($bot);
    }
}
