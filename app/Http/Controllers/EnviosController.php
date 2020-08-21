<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Traits\Converter;
use Exception;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Property;
use PhpParser\Node\Expr\Cast\Array_;

class EnviosController extends Controller
{
    //
    public function index()
    {
        $compras = DB::select('select co.idCompra, concat(p.nombre, " ", p.apellidoPaterno) as nombreCliente, co.fechaCompra
        from compra co inner join cliente cl on co.idCliente = cl.idCliente
                       inner join persona p on cl.idPersona = p.idPersona;');

        return view('Envios.EnviosIndex', ['compras' => $compras]);
    }

    public function Detalle($idCompra)
    {
        //Encontramos el proveedor con un determinado id
        $detalle = DB::select('select com.idCompra, p.titulo, iP.imagenUrl ,p.precioVenta, com.estatus,
            dC.cantidad
     from compra com inner join detalleCompra dC on com.idCompra = dC.idCompra
     inner join producto p on dC.idProducto = p.idProducto
     inner join imagenProducto iP on p.idProducto = iP.idProducto
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
        if (!empty($compra) && isset($compra)) {
            DB::statement('update compra set estatus = ? where idCompra = ?;', array($request->estatus, $idCompra));
        }
        return redirect('/Envios');
    }

    //GET pedidos del usuario
    public function enviosPorUsuario($idUsuario)
    {
        $idCompras = DB::select('select idCompra from compra where idCliente = (select cliente.idCliente from cliente where idUsuario = ?) order by idCompra desc;', array($idUsuario));
        $detalle = array();
        foreach ($idCompras as $compra) {
            $detalleCompra = DB::select('select com.idCompra, p.titulo, iP.imagenUrl ,p.precioVenta, com.estatus,
            dC.cantidad
     from compra com inner join detalleCompra dC on com.idCompra = dC.idCompra
     inner join producto p on dC.idProducto = p.idProducto
     inner join imagenProducto iP on p.idProducto = iP.idProducto
     where com.idCompra = ?;', array($compra->idCompra));
            array_push($detalle, $detalleCompra);
        }

        return view('Envios.EnviosPorUsuario', compact('detalle', 'idCompras'));
    }
}
