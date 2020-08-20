<?php

namespace App\Http\Controllers\Direccion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Direccion;
use Illuminate\Support\Facades\DB;

class DireccionController extends Controller
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
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direccion.create');
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

            $cliente = DB::table('cliente')
                ->join('users', 'cliente.idUsuario', '=', 'users.id')
                ->select('cliente.idPersona')
                ->where('cliente.idUsuario', '=', auth()->user()->id)
                ->get();

            foreach ($cliente as $item) {
                $idPersona = $item->idPersona;
            }

            $direccion = new Direccion();
                $direccion->codigoPostal = $request->input("codigoPostal");
                $direccion->calle = $request->input("calle");
                $direccion->colonia = $request->input("colonia");
                $direccion->estado = $request->input("estado");
                $direccion->municipio = $request->input("municipio");
                $direccion->descripcion =  $request->input("descripcion");
                $direccion->numero = $request->input("numero");
                $direccion->numeroExterno = $request->input("numeroExterno");
                $direccion->idPersona = $idPersona;
                $direccion->estatus = 1;
                $direccion->save();

                return redirect()->route('cliente.index')->with('status', 'Se guardo correctamente tu direccion');

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
        if(auth()->user()->idRol == 1 ){

            $direccion = DB::table('direccion')
                        ->select('direccion.codigoPostal','direccion.calle','direccion.idDireccion', 
                                'direccion.colonia', 'direccion.estado', 'direccion.municipio',
                                'direccion.descripcion', 'direccion.numero', 'direccion.numeroExterno')
                        ->where('direccion.idDireccion', '=', $id)
                        ->get();           

        //return $direccion->all();
            return view('direccion.edit', ['direccion' => $direccion]);

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
            $direccion = Direccion::findOrFail($id);

            $direccion->codigoPostal = $request->input("codigoPostal");
            $direccion->calle = strtoupper($request->input("calle"));
            $direccion->colonia = strtoupper($request->input("colonia"));
            $direccion->estado = $request->input("estado");
            $direccion->municipio = $request->input("municipio");
            $direccion->descripcion =  $request->input("descripcion");
            $direccion->numero = $request->input("numero");
            $direccion->numeroExterno = $request->input("numeroExterno");
            $direccion->save();

       return redirect()->route('cliente.index')->with('status', 'Se a actualizado correctamente tu direccion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion = Direccion::findOrFail($id);

        $direccion->estatus = 0;
        $direccion->save();

        return redirect()->route('cliente.index')->with('status', 'Se a eliminado tu direccion');
    }
}
