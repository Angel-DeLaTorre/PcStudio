<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carrito;

class CarritoController extends Controller
{
    public function index()
    {
        $listaProducto = DB::table('producto')
                        ->select('idProducto','titulo','descripcion', 'marca',
                                 'precioVenta')
                        ->where('estatus', '=', 1)
                        ->get();    
        
        //print_r($empleado);
        return view('Productosindex', ['listaProducto' => $listaProducto]);
    }

    public function agregarProductoCarrito(Request $request){
        $carrito = new Carrito();

        $cantidadProducto = DB::table('producto')
                                ->select('cantidad')
                                ->where('idProducto', '=', $request->idProducto)
                                ->get();
        foreach ($cantidadProducto as $value) {

            $cantidadDisponible = $value->cantidad;
        }
        if($request->cantidad <= $cantidadDisponible){
            $carrito->idUsuario = auth()->user()->id;
            $carrito->idProducto = $request->idProducto;
            $carrito->cantidadProducto = $request->cantidad;
            $carrito->estatus = 1;

            $carrito->save();

            return redirect($request->ruta);
        }
        else{
            return "Hola, no te salio";
        }
    }

    public function vistaProductosCarrito(){
        $listaProductoCarrito = DB::table('carrito')
                        ->join('producto', 'carrito.idProducto', '=', 'producto.idProducto')
                        ->select('carrito.idCarrito','producto.idProducto','producto.titulo',
                                'producto.descripcion','producto.marca', 'producto.precioVenta',
                                'carrito.cantidadProducto')
                        ->where(function($query)
                        {
                            $query->where('carrito.idUsuario', '=', auth()->user()->id)
                                  ->where('carrito.estatus', '=', 1);
                        })
                        ->get();
        
        //print_r(auth()->user()->id);
        return view('Carrito', ['listaProductoCarrito' => $listaProductoCarrito]);
    }

    public function destroy($idCarrito){
        
        $productoCarritoEliminar = Carrito::findOrFail($idCarrito);
        $productoCarritoEliminar->estatus = 0;

        $productoCarritoEliminar -> save();
        return redirect('/indexCarrito');
    }
}
