<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function indexCuestionarioDestino()
    {
        $listaPersonaPedido = DB::table('cliente')
            ->join('persona', 'cliente.idPersona', '=', 'cliente.idPersona')
            ->join('direccion', 'persona.idPersona', '=', 'direccion.idPersona')
            ->select('persona.idPersona','persona.nombre','persona.apellidoPaterno',
                    'persona.apellidoMaterno','persona.telefono','cliente.idCliente', 
                    'cliente.idUsuario','direccion.codigoPostal','direccion.calle',
                    'direccion.colonia','direccion.municipio','direccion.numeroExterno', 
                    'direccion.numero','direccion.descripcion')
            ->where(function($query)
            {
                $query->where('cliente.idUsuario', '=', auth()->user()->id);
            })
            ->get();

        $detalleCompra = session('DetalleCompra');
        return view('DatosEnvio', ['listaPersonaPedido' => $listaPersonaPedido], compact('detalleCompra'));
        //print_r($detalleCompra);
    }

    public function guardarDetalle(Request $request){        
        $IdProducto = $request['txtIdProducto'];
        $Cantidad = $request['txtCantidad'];
        $PrecioVenta = $request['txtSubtotal'];

        $detalleCompra = '';

        for($i = 0; $i < count($IdProducto);$i++){
            $detalleCompra = $detalleCompra . $IdProducto[$i] . '*' . $Cantidad[$i] . '*' . $PrecioVenta[$i] . '-';
        }

        session(['DetalleCompra' => $detalleCompra]);
        //print_r($txtIdProducto);
        return  redirect('/datosDestino');
    }

    public function insertarCompra(Request $request){        
    ///DATOS CLIENTE    
        $nombre      = $request['txtNombre'];
        $aPaterno    = $request['txtApellidoPaterno'];
        $aMaterno    = $request['txtApellidoMaterno'];
        $telefono    = $request['txtTelefono'];
        $cp          = $request['txtCp'];
        $colonia     = $request['txtColonia'];
        $calle       = $request['txtCalle'];
        $municipio   = $request['txtMunicipio'];
        $descripcion = $request['txtDescripcion'];
        $nInterno    = $request['txtNumeroInterno'];
        $nExterno    = $request['txtNumeroExterno'];
    ///DATOS COMPRA
        $fechaCompra = date('Y-m-d H:i:s');
        $empleado    = null;
        $cliente    = $request['txtCliente'];
    ///DETALLE COMPRA
        $detalle     = $request['txtDetalle'];
        
        $data = DB::select('call  sp_InsertarCompra(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
                            @var_idPersonaPedido,@var_idDireccionPedido,@var_idCompra,@var_idDetalleCompra)', 
                    array($nombre,$aPaterno,$aMaterno,$telefono,$cp,$colonia,$calle,$municipio,$descripcion,
                            $nInterno,$nExterno,$fechaCompra,$empleado,$cliente,$detalle));
        $id = DB::select('select @var_idPersonaPedido as idPersonaPedido');
        $id = DB::select('select @var_idDireccionPedido as idDireccionPedido');
        $id = DB::select('select @var_idCompra as idCompra');
        $id = DB::select('select @var_idDetalleCompra as idDetalleCompra');

        return  redirect('/exitoCompra');
    }

    public function detallesPago(Request $request){
        $datos = [
            "txtNombre"          => $request['txtNombre'],
            "txtApellidoPaterno" => $request['txtApellidoPaterno'],
            "txtApellidoMaterno" => $request['txtApellidoMaterno'],
            "txtTelefono"        => $request['txtTelefono'],
            "txtCp"              => $request['txtCp'],
            "txtColonia"         => $request['txtColonia'],
            "txtCalle"           => $request['txtCalle'],
            "txtMunicipio"       => $request['txtMunicipio'],
            "txtDescripcion"     => $request['txtDescripcion'],
            "txtNumeroInterno"   => $request['txtNumeroInterno'],
            "txtNumeroExterno"   => $request['txtNumeroExterno'],
            "fechaCompra"        => date('Y-m-d H:i:s'),
            "empleado"           => null,
            "txtCliente"         => $request['txtCliente'],
            "txtDetalle"         => $request['txtDetalle']
        ];
        $idList = array();
        $cantList = array();
        $costList = array();

        $items = explode("-", $request['txtDetalle']);
        array_pop($items);
        foreach($items as $item){
            $id = explode("*", $item);
            array_push($idList, $id[0]);
            array_push($cantList, $id[1]);
            array_push($costList, $id[2]);
        }


        $listaProducto = DB::table('producto')
            ->join('imagenproducto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
            ->select('producto.idProducto','producto.titulo',
                    'producto.descripcion','producto.marca', 'producto.precioVenta',
                    'imagenproducto.imagenUrl','producto.descuentoVenta','producto.cantidad')
            ->whereIn('producto.idProducto',$idList)
            ->get();
        
        for($i = 0; $i < count($cantList); $i++){
            $listaProducto[$i] ->cantidad = $cantList[$i];
            $listaProducto[$i] ->precioVenta = $costList[$i];
        }


 
        return view('Compra.pago',compact('datos','listaProducto'));
    }

    public function exito(){
        return view('Compra.exito');
    }
}
