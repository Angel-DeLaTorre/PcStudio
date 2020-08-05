<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /*
    *   redirectTo es una funcion que nos ayuda a redireccionar a los 
    *   diferentes tipos de usuarios, esta funcion se ejecuta al momento
    *   de iniciar session, sustituimos el routeServiceProvider que tiene 
    *   por defecto la ruta de home.
    *
    */
    public function redirectTo()
    {
        /*Obtenemos el id del usuario logueado*/
        $idUsuario = auth()->user()->id;
        
        /*Realizamos una consulta para obtener el rol del usuario logueado*/
        $rol = DB::select("select rol from rol where idRol = (Select idRol from users where id = $idUsuario)");
      
        /*Obtenemos el valor de el objeto que obtubimos de la consulta*/
       foreach ($rol as $item) {
          $rolValor = $item->rol;
       }

       /*Evaluamos que tipo de usuario es y lo redireccionamos*/
        if($rolValor == 'CLIENTE')
        {
            return '/home';
        }
        else if ($rolValor == 'EMPLEADO' || $rolValor == 'ADMIN')
        {
            return '/homeAdministrativo';
        }
        else
        {
            return view('auth.login');
        }
       

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
