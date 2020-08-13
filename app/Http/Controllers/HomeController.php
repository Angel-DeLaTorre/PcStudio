<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
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

        $cantidadUsuarios = $this->contarNuevosUsuariosUltimoMes();


        return view('home', ['saludo' => $saludo], ['cantidadUsuarios' => $cantidadUsuarios]);
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
        } else if ($hora >= 19 && $hora < 1) {
            $saludo = 'Buenas noches';
        } else {
            $saludo = 'Buen día';
        }

        return $saludo;
    }

    //Realiza el conteo de los usuarios de tipo cliente registrados durante el último mes
    private function contarNuevosUsuariosUltimoMes()
    {

        $data = DB::table('users')->where('idRol', '=', 1)->whereMonth('created_at', '=', Carbon::now()->month)->count();

        if ($data) {

            return $data;
        } else {
            return 0;
        }
    }
}
