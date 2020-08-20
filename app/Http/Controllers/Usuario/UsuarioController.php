<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->idRol == 3){

            $user =  DB::table('users')
            ->join('rol', 'users.idRol', '=', 'rol.idRol')
            ->select('users.id','users.name','users.email','rol.rol')
            ->get();
    
            return view('usuario.index', ['usuarios' => $user]);

        }else{

            return redirect()->route('home')->with('status', 'Solo Usuarios de tipo Administrador');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $idUsuario = auth()->user()->id;       

        if($idUsuario  != $id ){

            $user =  DB::table('users')
            ->join('rol', 'users.idRol', '=', 'rol.idRol')
            ->select('users.id','users.name','users.email','rol.rol')
            ->where('users.id','=', $id)
            ->get();

            foreach ($user as $item) {
                $rol = $item->rol;
            }

            if($rol != 'ADMIN'){

                return view('usuario.edit', ['usuario' => $user]);

            }else{

                return redirect()->route('usuario.index')->with('status', 'No se puede actualizar a un administrador');

            }            

        }else{
            
            return redirect()->route('usuario.index')->with('status', 'No se puede actualizar a si mismo');

        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nombre = $request->name;
        $email = $request->email;       
        $rol = strtoupper($request->rol);
        $contraseña = $request->password;

        if($contraseña != null)
        {
            $contraseña = Hash::make($request->password);
        }

        //eturn $request->all();
        $data = DB::select('call  sp_actualizarUsuario(?, ?, ?, ?, ?)',
        array($id, $nombre, $email, $contraseña, $rol));

        
        return redirect()->route('usuario.index')->with('status', 'Se a actualizado el Usuario');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
