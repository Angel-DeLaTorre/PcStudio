<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Return_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {

        $saludo = $this->obtenerSaludo();

        $nombreSaludo = $this->obtenerNombreUsuario();

        $productosMasVendidos = $this->obtenerProductoMasVendido();

        $cantidadUsuarios = $this->contarNuevosUsuarios();

        $cantidadVentas = $this->obtenerCantidadVentas();

        return view('home', [
            'saludo' => $saludo, 'nombreSaludo' => $nombreSaludo,
            'cantidadUsuarios' => $cantidadUsuarios, 'productosMasVendidos' => $productosMasVendidos,
            'cantidadVentas' => $cantidadVentas
        ]);
    }

    private function obtenerCantidadVentas(){

        $cantidadVentasActual = DB::table('detalleCompra')
        ->join('compra', 'detalleCompra.idCompra', '=', 'compra.idCompra')
        ->whereMonth('compra.fechaCompra', '=', Carbon::now()->month)->whereYear('compra.fechaCompra', '=', Carbon::now()->year)->sum('detalleCompra.cantidad');

        $cantidadVentasPasado = DB::table('detalleCompra')
        ->join('compra', 'detalleCompra.idCompra', '=', 'compra.idCompra')
        ->whereMonth('compra.fechaCompra', '=', Carbon::now()->subMonth()->format('m'))->sum('detalleCompra.cantidad');

        $cantidadVentas = array();

        if($cantidadVentasActual){

            array_push($cantidadVentas, $cantidadVentasActual);
            
        } else{
            
            array_push($cantidadVentas, 0);

        }

        if($cantidadVentasPasado){

            array_push($cantidadVentas, $cantidadVentasPasado);
            
        } else{
            
            array_push($cantidadVentas, 0);

        }

        return $cantidadVentas;

    }



    //Consulta los nombres de los productos más vendidos durante el 
    //mes actual y el mes anterior
    private function obtenerProductoMasVendido()
    {

        $tituloProductoActual = DB::table('producto')->select('titulo')->where('idProducto', function ($query) {
            $query->select('idProducto')->from('detalleCompra')->join('compra', 'detalleCompra.idCompra', '=', 'compra.idCompra')
                ->whereMonth('compra.fechaCompra', '=', Carbon::now()->month)->whereYear('compra.fechaCompra', '=', Carbon::now()->year)
                ->orderByDesc('cantidad')->limit(1);
        })->get();

        $tituloProductoAnterior = DB::table('producto')->select('titulo')->where('idProducto', function ($query) {
            $query->select('idProducto')->from('detalleCompra')->join('compra', 'detalleCompra.idCompra', '=', 'compra.idCompra')
                ->whereMonth('compra.fechaCompra', '=', Carbon::now()->subMonth()->format('m'))->orderByDesc('cantidad')->limit(1);
        })->get();


        $productos = array();



        if ($tituloProductoActual) {
            array_push($productos, $tituloProductoActual[0]->titulo);
        } else {
            array_push($productos, "Sin productos populares este mes");
        }

        if ($tituloProductoAnterior) {
            array_push($productos, $tituloProductoAnterior[0]->titulo);
        } else {
            array_push($productos, "Sin productos populares el mes anterior");
        }

        return $productos;
    }

    //COnsulta el nombre de la Persona para el Usuario actual
    private function obtenerNombreUsuario()
    {

        $idUsuario = Auth::user()->id;

        $nombre = DB::table('persona')

            ->join('empleado', 'empleado.idPersona', '=', 'persona.idPersona')->join('users', 'users.id', 'empleado.idUsuario')
            ->select('persona.nombre')
            ->where('users.id', '=', $idUsuario)
            ->get();


        if ($nombre) {
            return $nombre[0]->nombre;
        } else {
            return Auth::user()->nombre;
        }
    }


    //Permite establecer un saludo con base en la hora del día
    //del servidor actual
    private function obtenerSaludo()
    {

        $hora = date('H');

        if ($hora > 1 && $hora < 12) {
            $saludo = 'Buenos días';
        } else if ($hora >= 12  && $hora < 19) {
            $saludo = 'Buenas tardes';
        } else if ($hora >= 19 && $hora < 24) {
            $saludo = 'Buenas noches';
        } else {
            $saludo = 'Buen día';
        }

        return $saludo;
    }

    //Realiza el conteo de los usuarios de tipo cliente registrados durante el último mes
    private function contarNuevosUsuarios()
    {

        $cantidadUltimoMes = DB::table('users')->where('idRol', '=', 1)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();

        $cantidadMesPasado = DB::table('users')->where('idRol', '=', 1)->whereMonth('created_at', '=', Carbon::now()->subMonth()->format('m'))->count();

        $nuevosUsuarios = array();

        if ($cantidadUltimoMes) {
            array_push($nuevosUsuarios, $cantidadUltimoMes);
        } else {
            array_push($nuevosUsuarios, 0);
        }

        if ($cantidadMesPasado) {
            array_push($nuevosUsuarios, $cantidadMesPasado);
        } else {
            array_push($nuevosUsuarios, 0);
        }


        return $nuevosUsuarios;
    }
}
