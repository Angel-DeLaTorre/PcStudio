<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Traits\Converter;
use Exception;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Property;

class EnviosController extends Controller
{
    //
    public function index()
    {
        $compras = DB::select('select c.idCompra, c.fechaCompra ,concat(p.nombre, " ", p.apellidoPaterno) as nombreEmpleado, concat(p2.nombre, " ", p2.apellidoPaterno) as nombreCliente, c.estatus
                                from compra c inner join empleado e on c.idEmpleado = e.idEmpleado
                                inner join persona p on e.idPersona = p.idPersona
                                inner join cliente cl on c.idCliente = cl.idCliente
                                inner join persona p2 on cl.idPersona = p2.idPersona;');

        return view('Envios.EnviosIndex', ['compras' => $compras]);
    }

    public function Detalle($idCompra)
    {
        //Encontramos el proveedor con un determinado id
        $detalle = DB::select('select com.idCompra, p.titulo, iP.imagenUrl ,p.precioVenta, concat(per.nombre, " ", per.apellidoPaterno, " ", per.apellidoMaterno) as nombreCliente, concat(per2.nombre, " ", per2.apellidoPaterno, " ", per2.apellidoMaterno) as nombreEmpleado, com.estatus,
        dC.cantidad
 from compra com inner join detalleCompra dC on com.idCompra = dC.idCompra
 inner join producto p on dC.idProducto = p.idProducto
 inner join persona per on per.idPersona = (select cliente.idPersona from cliente where cliente.idCliente = com.idCliente)
 inner join persona per2 on per2.idPersona = (select empleado.idPersona from empleado where empleado.idEmpleado = com.idEmpleado)
 inner join imagenproducto iP on p.idProducto = iP.idProducto
 where com.idCompra = ?;', array($idCompra));

        return view('Envios.EnviosDetalle', compact('detalle'));
    }

    // GET edit Envio
    public function edit($idCompra)
    {
        $compra = DB::select('select * from compra where idCompra = ?;', array($idCompra));
        return view('Envios.EnviosEditar', compact('compra'));
    }

    //POST edit Envio
    public function update(Request $request, $idCompra)
    {
        $compra = DB::select('select * from compra where idCompra = ?;', array($idCompra));
        if(!empty($compra) && isset($compra))
        {
            DB::statement('update compra set estatus = ? where idCompra = ?;', array($request -> estatus, $idCompra));
        }
        return redirect('/Envios');
    }
}
