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
        if(auth()->user()->idRol == 2 ||  auth()->user()->idRol == 3 ){

            $empleado = DB::table('empleado')
            ->join('persona', 'empleado.idPersona', '=', 'persona.idPersona')
            ->select('empleado.idEmpleado','empleado.codigoEmpleado','empleado.estatus', 'persona.idPersona',
                    'persona.nombre', 'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                    'persona.telefono', 'persona.rfc')
            ->where('empleado.estatus', '=', 1)
            ->get();
        

            return view('empleado.index', ['empleado' => $empleado]);

        }else{

            abort(401, 'Esta Accion no esta autorizada');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->idRol == 2 ||  auth()->user()->idRol == 3 ){

            return view('empleado.create');

        }else{

            abort(401, 'Esta Accion no esta autorizada');

        }
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


        $data = DB::select('call  sp_insertarEmpleado(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nombre, $email, $password, $rol, $apellidoP, $apellidoM, $fecha, $tel, $rfc));


        $validacion = $data[0];

        return redirect()->route('empleado.index')->with('status', $validacion);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->idRol == 2 ||  auth()->user()->idRol == 3 ){
            $empleado = DB::table('empleado')
            ->join('persona', 'empleado.idPersona', '=', 'persona.idPersona')
            ->join('users', 'empleado.idUsuario', '=', 'users.id')
            ->select('empleado.idEmpleado','empleado.codigoEmpleado','empleado.estatus', 'persona.idPersona',
                    'persona.nombre', 'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                    'persona.telefono', 'persona.rfc', 'users.email')
            ->where('empleado.idEmpleado', '=', $id)
            ->get();

            return view('empleado.show', ['empleado' => $empleado]);
        }else{

            abort(401, 'Esta Accion no esta autorizada');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->idRol == 2 ||  auth()->user()->idRol == 3 ){

            $empleado = DB::table('empleado')
                        ->join('persona', 'empleado.idPersona', '=', 'persona.idPersona')
                        ->select('empleado.idEmpleado','empleado.codigoEmpleado','empleado.estatus','persona.nombre', 
                                'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                                'persona.telefono', 'persona.rfc', 'persona.tipo')
                        ->where('empleado.idEmpleado', '=', $id)
                        ->get();

        
            return view('empleado.edit', ['empleado' => $empleado]);

        }else{

            abort(401, 'Esta Accion no esta autorizada');

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
        $idEpleado = $id;   
        $nombre = $request['name'];
        $apellidoP = $request->apellidoP;
        $apellidoM = $request->apellidoM;
        $fecha = $request->fechaN;
        $tel = $request->telefono;
        $rfc = $request->rfc;
        

        $data = DB::select('call  sp_actualizarEmpleado(?, ?, ?, ?, ?, ?, ?)',
        array($idEpleado, $nombre, $apellidoP, $apellidoM, $fecha, $tel, $rfc));

        //dd($data);
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
        if(auth()->user()->idRol == 2 ||  auth()->user()->idRol == 3 ){
        
            $data = DB::select("UPDATE empleado SET estatus = 0 WHERE idEmpleado = $id");
            
            echo "<script>alert('se a actualizado');</script>";
            
            return redirect()->route('empleado.index')->with('status', 'El empleado se a Eliminado');
            
        }else{

            abort(401, 'Esta Accion no esta autorizada');

        }
        
    }
}
