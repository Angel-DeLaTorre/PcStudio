<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        //Aquí van a ir las consultas jajajajajaja
        $saludo = 'Buenas noches';

        return view('home', ['saludo' => $saludo]);
    }

    private function obtenerSaludo()
    {

        $hora = date('H');

        if ($hora > 1 && $hora < 12) {
            $saludo = 'Buenos días';
        } else if ($hora >= 12  && $hora < 19) {
            $saludo = 'Buenas tardes';
        } else if ($hora >= 19 && $hora < 1) {
            $saludo = 'Buenas noches';
        } else{
            $saludo = 'Buen día';
        }

        return $saludo;
    }

    
}
