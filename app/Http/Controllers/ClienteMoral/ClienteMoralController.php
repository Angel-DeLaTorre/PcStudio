<?php

namespace App\Http\Controllers\ClienteMoral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ClienteMoral\Exception;

class ClienteMoralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institucion = DB::table('persona')
        ->join('cliente', 'persona.idPersona', '=', 'cliente.idPersona')
        ->join('contacto', 'persona.idPersona', '=', 'contacto.idPersona')
        ->select('cliente.idCliente','cliente.codigoCliente', 'persona.idPersona',
                'persona.nombre', 'persona.rfc', 'contacto.nombre AS nombreContacto',
                'contacto.telefono AS telefonoContacto', 'contacto.email')
        ->where('cliente.estatus', '=', 1)
        ->get();

        //return $institucion;
       return view('clienteMoral.index', ['institucion' => $institucion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clienteMoral.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $email = $request['email']; 
       $password = Hash::make($request['password']);

        
        $data = DB::select('call  sp_insertarClienteMoral(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($request->nameInstitucion, $request->telInstitucion, $request->rfc, 
                  $request->nombreContacto, $request->telContacto, $request->ext, 
                  $request->emailContacto, $email, $password));


        return redirect()->route('clienteMoral.index')->with('status', 'Se a guardado el empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$institucion = DB::table('persona')
        ->join('cliente', 'persona.idPersona', '=', 'cliente.idPersona')
        ->join('contacto', 'persona.idPersona', '=', 'contacto.idPersona')
        ->select('cliente.idCliente','cliente.codigoCliente', 'persona.idPersona',
                'persona.nombre', 'persona.rfc', 'persona.telefono', 'contacto.ext',
                'contacto.nombre AS nombreContacto',
                'contacto.telefono AS telefonoContacto', 'contacto.email')
        ->where('cliente.idPersona', '=', $id)
        ->get();

        return $institucion;*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucion = DB::table('persona')
        ->join('cliente', 'persona.idPersona', '=', 'cliente.idPersona')
        ->join('contacto', 'persona.idPersona', '=', 'contacto.idPersona')
        ->select('cliente.idCliente','cliente.codigoCliente', 'persona.idPersona',
                'persona.nombre', 'persona.rfc', 'persona.telefono', 'contacto.ext',
                'contacto.nombre AS nombreContacto',
                'contacto.telefono AS telefonoContacto', 'contacto.email')
        ->where('cliente.idPersona', '=', $id)
        ->get();

        //return $institucion;
        
        
        return view('clienteMoral.edit', ['institucion' => $institucion]);
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

        $data = DB::select('call  sp_actualizarClienteMoral(?, ?, ?, ?, ?, ?, ?, ?)',
            array($id, $request->nameInstitucion, $request->telInstitucion, $request->rfc, 
                $request->nombreContacto, $request->telContacto, $request->ext, 
                $request->emailContacto));        
 
         $resultado = $data[0];
         
        
         return redirect()->route('clienteMoral.index')->with('status', $resultado);         
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          
        $data = DB::select("UPDATE cliente  SET estatus = 0 WHERE idCliente = $id");
        
        return redirect()->route('clienteMoral.index')->with('status', 'Todo bien camariata');
    }
}
