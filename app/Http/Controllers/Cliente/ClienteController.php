<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        $cliente = DB::table('cliente')
                    ->join('persona', 'cliente.idPersona', '=', 'persona.idPersona')
                    ->select('cliente.idCliente','cliente.codigoCliente','cliente.estatus','persona.nombre', 
                            'persona.apellidoPaterno', 'persona.apellidoMaterno', 'persona.fechaNacimiento',
                            'persona.telefono', 'persona.rfc', 'persona.tipo')
                    ->where('cliente.idUsuario', '=', $id)
                    ->get();

        return view('cliente.edit', ['cliente' => $cliente]);
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
        //
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
