<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Empleado;
use Illuminate\Support\Facades\DB;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = DB::table('empleados')
        ->join('persona', 'empleados.idEmpleado', '=', 'persona.idPersona')
        ->select('empleados.idEmpleado','empleados.codigoEmpleado','empleados.estatus', 'persona.idPersona',
                'persona.nombre', 'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                'persona.telefono', 'persona.rfc')
        ->where('estatus', '=', 1)
        ->get();
        

        return view('empleado.index', ['empleado' => $empleado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $nombre = $request['name'];
       $email = $request['email']; 
       $password = Hash::make($request['password']);
       $rol = $request->rol;
       $apellidoP = $request->apellidoP;
       $apellidoM = $request->apellidoM;
       $fecha = $request->fechaN;
       $tel = $request->telefono;
       $rfc = $request->rfc;
       $estatus = 1;

        //return $request->all();

        $data = DB::select('call  sp_empleado(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nombre, $email, $password, $rol, $apellidoP, $apellidoM, $fecha, $tel, $rfc, $estatus));

        return redirect()->route('empleado.index')->with('status', 'Se a guardado el empleado');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'hola show';
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = DB::table('empleados')
                    ->join('persona', 'empleados.idEmpleado', '=', 'persona.idPersona')
                    ->select('empleados.idEmpleado','empleados.codigoEmpleado','empleados.estatus','persona.nombre', 
                            'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                            'persona.telefono', 'persona.rfc', 'persona.tipo')
                    ->where('empleados.idEmpleado', '=', $id)
                    ->get();

       
        return view('empleado.edit', compact('empleado'));
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
        $idEpleado = $id;   
        $nombre = $request['name'];
        $apellidoP = $request->apellidoP;
        $apellidoM = $request->apellidoM;
        $fecha = $request->fechaN;
        $tel = $request->telefono;
        $rfc = $request->rfc;
        

        $data = DB::select('call  sp_actualizarEmpleado(?, ?, ?, ?, ?, ?, ?)',
        array($idEpleado, $nombre, $apellidoP, $apellidoM, $fecha, $tel, $rfc));

        //print_r($data);
        return redirect()->route('empleado.index')->with('status', 'El empleado Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = DB::select("UPDATE empleados SET estatus = 0 WHERE idEmpleado = $id");
        
        echo "<script>alert('se a actualizado');</script>";
        
        return redirect()->route('empleado.index')->with('status', 'El empleado se a Eliminado');
        
    }
}
