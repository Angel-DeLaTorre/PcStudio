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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  DB::table('users')
        ->join('rol', 'users.idRol', '=', 'rol.idRol')
        ->select('users.id','users.name','users.email','rol.rol')
        ->get();

        return view('usuario.index', ['usuarios' => $user]);
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
        $user =  DB::table('users')
        ->join('rol', 'users.idRol', '=', 'rol.idRol')
        ->select('users.id','users.name','users.email','rol.rol')
        ->where('users.id','=', $id)
        ->get();

        return view('usuario.edit', ['usuario' => $user]);
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
