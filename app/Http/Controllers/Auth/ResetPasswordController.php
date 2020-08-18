<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    
    //protected $redirectTo = '/';
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
            return '/';
        }
        else if ($rolValor == 'EMPLEADO' || $rolValor == 'ADMIN')
        {
            return '/home';
        }
        else
        {
            return view('auth.login');
        }
       

    }
}
