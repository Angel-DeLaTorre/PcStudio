<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SnatchBotController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->path();
                
        $productos = DB::table('imagenProducto')
                    ->join('producto', 'producto.idProducto', '=', 'imagenProducto.idProducto')
                    ->select('imagenProducto.imagenUrl','imagenProducto.idProducto','producto.titulo',
                                'producto.descripcion', 'producto.marca','producto.precioVenta', 
                                'producto.cantidad', 'producto.descuentoVenta')
                    ->where('idCategoria', '=', $url)
                    ->get();
        
        return view('producto.busqueda', compact('productos'));
        //print_r($u);
    }
}
