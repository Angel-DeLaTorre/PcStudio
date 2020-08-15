<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
        if(auth()->user()->idRol == 1 ){

            $cliente = DB::table('cliente')
                        ->join('persona', 'cliente.idPersona', '=', 'persona.idPersona')
                        ->select('cliente.idCliente','persona.nombre', 'persona.idPersona', 
                                'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                                'persona.telefono', 'persona.rfc')
                        ->where('cliente.idUsuario', '=', auth()->user()->id)
                        ->get();

             foreach ($cliente as $item) {
                    $idPersona = $item->idPersona;
                }

            $direccion = DB::table('direccion')
                        ->join('persona', 'direccion.idPersona', '=', 'persona.idPersona')
                        ->select('direccion.idDireccion','direccion.codigoPostal','direccion.calle', 
                                'persona.idPersona', 'direccion.colonia', 
                                'direccion.estado', 'direccion.municipio',
                                'direccion.estatus','direccion.descripcion',
                                'direccion.numero', 'direccion.numeroExterno')
                        ->where('direccion.idPersona', '=', $idPersona)
                        ->where('direccion.estatus', '=', 1)
                        ->get();           

           
           return view('cliente.index', ['cliente' => $cliente], ['direccion' => $direccion]);

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
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->idRol == 1){
            $idUsuario = auth()->user()->id;

            $tortalRespuestas = $request->R1 + $request->R2 + $request->R3 + $request->R4;

            if($tortalRespuestas >= 11){
            
                $tag = 'Experto';
                        
                }else if($tortalRespuestas >= 7 && $tortalRespuestas <= 10 ){
            
                $tag = 'Avanzado';
                
                }else if($tortalRespuestas >= 4 && $tortalRespuestas <= 6){            
                $tag = 'Principiante';
                
            }else{                
            $tag = 'Elemental';
                    
            }
            
            
            $data = DB::select('call  sp_insertarCliente(?, ?, ?, ?, ?, ?, ?, ?)',
            array($request->name, $request->apellidoP, $request->apellidoM, 
                $request->fechaN, $request->telefono, $request->rfc, $idUsuario, $tag));


            return redirect("/");

        }else{

            abort(401, 'Esta Accion no esta autorizada');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

        if(auth()->user()->idRol == 1){

            $cliente = DB::table('cliente')
                        ->join('persona', 'cliente.idPersona', '=', 'persona.idPersona')
                        ->select('cliente.idCliente','persona.nombre',  'cliente.idPersona',
                                'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                                'persona.telefono', 'persona.rfc')
                        ->where('cliente.idUsuario', '=', $id)
                        ->get();
       

            //$direccion = DB::table('direccion')->where('idPersona', $id);

            //return $cliente->all();
           return view('cliente.edit', ['cliente' => $cliente]);

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
        $data = DB::select('call  sp_actualizarCliente(?, ?, ?, ?, ?, ?, ?)',
        array($id , $request->name, $request->apellidoP,$request->apellidoM,
            $request->fecha,$request->telefono, $request->rfc));

        return redirect()->route('cliente.index');       
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
