<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function indexDetalleCompra(){
        $listaDetalleCompra = DB::table('persona')
                            ->join('cliente', 'persona.idPersona', '=', 'cliente.idPersona')
                            ->join('compra', 'cliente.idCliente', '=', 'compra.idCliente')
                            ->join('detalleCompra', 'compra.idCompra', '=', 'detalleCompra.idCompra')
                            ->join('producto', 'detalleCompra.idProducto', '=', 'producto.idProducto')
                            ->select('persona.nombre','persona.apellidoPaterno','persona.apellidoMaterno',
                                    'persona.telefono','cliente.idCliente','compra.fechaCompra',
                                    'compra.idEmpleado','compra.idCompra','producto.titulo',
                                    'detalleCompra.cantidad','detalleCompra.costo')
                            ->get();

        return view('DetalleCompras', ['listaDetalleCompra' => $listaDetalleCompra]);
    }

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
            ->limit(1)
            ->get();
        $direcciones = DB::table('direccion')
        ->join('cliente', 'cliente.idPersona', '=', 'direccion.idPersona')
        ->join('persona', 'persona.idPersona', '=', 'cliente.idPersona')
        ->join('users', 'users.id', '=', 'cliente.idUsuario')
        ->select('direccion.idDireccion','direccion.codigoPostal','direccion.calle','cliente.idUsuario',
                'direccion.colonia','direccion.estado','direccion.municipio', 
                'direccion.descripcion','direccion.numero','direccion.numeroExterno','cliente.idCliente',
                'persona.telefono','persona.nombre','persona.apellidoPaterno','persona.apellidoMaterno')
        ->where('cliente.idUsuario','=',auth()->user()->id)
        ->get(); 

        $detalleCompra = session('DetalleCompra');
        
        //echo auth()->user()->id;
        //print_r($direcciones);
        return view('DatosEnvio', ['listaPersonaPedido' => $listaPersonaPedido], compact('detalleCompra','direcciones'));
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
        //print_r(count($IdProducto));
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
        $id = DB::select('select @var_idDetalleCompra as idDetalleCompra');
        $idCompra = DB::select('select @var_idCompra as idCompra');
        
        return redirect()->action(
            'ComprasController@detalle', ['idCompra' => 1]
        );
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
            ->join('imagenProducto', 'producto.idProducto', '=', 'imagenProducto.idProducto')
            ->select('producto.idProducto','producto.titulo',
                    'producto.descripcion','producto.marca', 'producto.precioVenta',
                    'imagenProducto.imagenUrl','producto.descuentoVenta','producto.cantidad')
            ->whereIn('producto.idProducto',$idList)
            ->get();
        
        for($i = 0; $i < count($cantList); $i++){
            $listaProducto[$i] ->cantidad = $cantList[$i];
            $listaProducto[$i] ->precioVenta = $costList[$i];
        }


 
        return view('Compra.pago',compact('datos','listaProducto'));
    }

    public function detalle(Request $detalle){
        if( $detalle->input('idCompra') != null ){
            $idCompra = $detalle->input('idCompra');
        }
        if( $detalle->input('detalle') != null ){
            $idCompra = $detalle->input('detalle');
        }

        
        return view('Compra.exito',compact('idCompra'));
    }
}
