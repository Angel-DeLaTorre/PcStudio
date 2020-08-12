<?php

namespace App\Http\Controllers\ClienteAdministrativo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteAdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clienteAdministrativo = DB::table('cliente')
        ->join('persona', 'cliente.idPersona', '=', 'persona.idPersona')
        ->select('cliente.idCliente','cliente.codigoCliente', 'persona.idPersona',
                'persona.nombre', 'persona.apellidoPaterno', 'persona.apellidoMaterno',
                'persona.fechaNacimiento', 'persona.telefono')
        ->where('cliente.estatus', '=', 1)
        ->get();

        //return $institucion;
       return view('clienteAdministrativo.index', ['clienteAdministrativo' => $clienteAdministrativo]);
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
       $clienteAdministrativo = DB::table('cliente')
        ->join('persona', 'cliente.idPersona', '=', 'persona.idPersona')
        ->select('cliente.idCliente','cliente.codigoCliente', 'persona.idPersona',
                'persona.nombre', 'persona.apellidoPaterno', 'persona.apellidoMaterno',
                'persona.fechaNacimiento', 'persona.telefono')
        ->where('cliente.idCliente', '=', $id)
        ->get();

    
       return view('clienteAdministrativo.edit', ['clienteAdministrativo' => $clienteAdministrativo]);
    
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
