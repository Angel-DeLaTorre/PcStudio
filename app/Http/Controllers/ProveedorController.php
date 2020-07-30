<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Carbon\Traits\Converter;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    //GET vista index
    public function index()
    {
        //$proveedores = Proveedor::paginate(10); //Numero de elementos a mostrar por página
        $proveedores = DB::table('proveedor') -> where('estatus', 1) -> get();
        return view('proveedorIndex', ['proveedores' => $proveedores]);
    }

    //GET vista create
    public function create()
    {
        return view('proveedorCreate');
    }

    //POST create proveedor
    public function store(Request $request)
    {
        $p = new Proveedor();

        $p->nombre = $request->nombre;
        $p->descripcion = $request->descripcion;
        $p->estatus = 1;

        $p->save();

        return  redirect('/Proveedores');
    }

    //GET edit proveedor
    public function edit($idProveedor)
    {
        //Encontramos el proveedor con un determinado id
        $proveedor = Proveedor::findOrFail($idProveedor);
        return view('proveedorEdit', compact('proveedor'));
    }

    //POST edit proveedor
    public function update(Request $request, $idProveedor)
    {
        $proveedorUpdated = Proveedor::findOrFail($idProveedor);
        $proveedorUpdated -> nombre = $request -> nombre;
        $proveedorUpdated -> descripcion = $request -> descripcion;

        $proveedorUpdated -> save();
        return redirect('/Proveedores');
    }

    public function destroy($idProveedor)
    {
        $proveedorEliminar = Proveedor::findOrFail($idProveedor);
        $proveedorEliminar -> estatus = 0;

        $proveedorEliminar -> save();
        return redirect('/Proveedores');
    }
}
