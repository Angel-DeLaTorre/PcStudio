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
        $this->obtenerCategoriasMasVendidas();
        $saludo = $this->obtenerSaludo();

        $nombreSaludo = $this->obtenerNombreUsuario();

        $productosMasVendidos = $this->obtenerProductoMasVendido();

        $cantidadUsuarios = $this->contarNuevosUsuarios();

        $cantidadVentas = $this->obtenerCantidadVentas();

        $this->obtenerCantidadUsuariosClasificados();

        return view('home', [
            'saludo' => $saludo, 'nombreSaludo' => $nombreSaludo,
            'cantidadUsuarios' => $cantidadUsuarios, 'productosMasVendidos' => $productosMasVendidos,
            'cantidadVentas' => $cantidadVentas
        ]);
    }

    public function obtenerCategoriasMasVendidas()
    {

        $categoriasMasVendidos = DB::table('detalleCompra')
            ->join('producto', 'detalleCompra.idProducto', '=', 'producto.idProducto')
            ->join('categoria', 'categoria.idCategoria', '=', 'producto.idCategoria')
            ->select('categoria.nombre AS categoria', DB::raw('SUM(detalleCompra.cantidad) AS monto'))
            ->groupBy('detalleCompra.idProducto', 'detalleCompra.cantidad')
            ->orderByDesc('detalleCompra.cantidad')->limit(8)->get()->toArray();


        return response()->json($categoriasMasVendidos);
    }


    //Consulta de los productos más vendidos
    public function obtenerProductosMasVendidos()
    {

        $productosMasVendidos = DB::table('detalleCompra')
            ->join('producto', 'detalleCompra.idProducto', '=', 'producto.idProducto')
            ->select('producto.titulo AS producto', DB::raw('SUM(detalleCompra.cantidad) AS unidades'))
            ->groupBy('detalleCompra.idProducto', 'detalleCompra.cantidad')
            ->orderByDesc('detalleCompra.cantidad')->limit(10)->get()->toArray();

        return response()->json($productosMasVendidos);
    }


    //Consulta y ordena la información necesaria para graficar
    //los clientes ordenados por sus tags
    public function obtenerCantidadUsuariosClasificados()
    {

        $usuariosTag = array();

        //1 - Experto
        //2 - Avanzado
        //3 - Principiante
        //4 - Elemental

        $experto = DB::table('cliente')->where('idTag', '=', 1)->count();

        if ($experto) {
            $usuariosTag[0]['tag'] = 'Experto';
            $usuariosTag[0]['cantidad'] = $experto;
        } else {
            $usuariosTag[0]['tag'] = 'Experto';
            $usuariosTag[0]['cantidad'] = 0;
        }

        $avanzado = DB::table('cliente')->where('idTag', '=', 2)->count();

        if ($avanzado) {

            $usuariosTag[1]['tag'] = 'Avanzado';
            $usuariosTag[1]['cantidad'] = $avanzado;
        } else {
            $usuariosTag[1]['tag'] = 'Avanzado';
            $usuariosTag[1]['cantidad'] = 0;
        }

        $principiante = DB::table('cliente')->where('idTag', '=', 3)->count();

        if ($principiante) {

            $usuariosTag[2]['tag'] = 'Principiante';
            $usuariosTag[2]['cantidad'] = $principiante;
        } else {
            $usuariosTag[2]['tag'] = 'Principiante';
            $usuariosTag[2]['cantidad'] = 0;
        }

        $elemental = DB::table('cliente')->where('idTag', '=', 4)->count();

        if ($elemental) {

            $usuariosTag[3]['tag'] = 'Elemental';
            $usuariosTag[3]['cantidad'] = $elemental;
        } else {
            $usuariosTag[3]['tag'] = 'Elemental';
            $usuariosTag[3]['cantidad'] = 0;
        }


        return response()->json($usuariosTag);
    }



    //Consulta de la cantidad de productos vendidos durante el mes
    //actual y el mes anterior
    private function obtenerCantidadVentas()
    {

        $cantidadVentasActual = DB::table('detalleCompra')
            ->join('compra', 'detalleCompra.idCompra', '=', 'compra.idCompra')
            ->whereMonth('compra.fechaCompra', '=', Carbon::now()->month)->whereYear('compra.fechaCompra', '=', Carbon::now()->year)->sum('detalleCompra.cantidad');

        $cantidadVentasPasado = DB::table('detalleCompra')
            ->join('compra', 'detalleCompra.idCompra', '=', 'compra.idCompra')
            ->whereMonth('compra.fechaCompra', '=', Carbon::now()->subMonth()->format('m'))->sum('detalleCompra.cantidad');

        $cantidadVentas = array();

        if ($cantidadVentasActual) {

            array_push($cantidadVentas, $cantidadVentasActual);
        } else {

            array_push($cantidadVentas, 0);
        }

        if ($cantidadVentasPasado) {

            array_push($cantidadVentas, $cantidadVentasPasado);
        } else {

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
