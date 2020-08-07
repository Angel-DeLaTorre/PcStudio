<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = DB::table('producto')
        //->join('persona', 'empleados.idEmpleado', '=', 'persona.idPersona')
        ->select('producto.idProducto','producto.titulo','producto.descripcion', 'producto.marca',
                'producto.precioCompra', 'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta',
                'producto.estatus', 'producto.created_at')
        ->where('estatus', '=', 1)
        ->get();
        
        return view('producto.index', ['producto' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = DB::table('tag')
            ->select('tag.idTag','tag.tag')
            ->get();
        $categorias = DB::table('categoria')
            ->select('categoria.idCategoria','categoria.nombre')
            ->get();
        $proveedores = DB::table('proveedor')
            ->select('proveedor.idProveedor','proveedor.nombre')
            ->where('estatus','=',1)
            ->get();        
        return view('producto.create',compact('proveedores','tags','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titulo        = $request['titulo'];
        $descripcion   = $request['descripcion'];
        $marca         = $request['marca'];
        $cantidad      = $request['cantidad'];
        $precioC       = $request['precioC'];
        $precioV       = $request['precioV'];
        $fechaA        = date("yy-m-d");;
        $descuento     = $request['descuento'];
        $proveedor     = $request['proveedor'];
        $tag           = $request['tag'];
        $categoria     = $request['categoria'];
        $estatus       = $request['estatus'];
        $nombreC       = $request['nombreC'];
        $descripcionC  = $request['descripcionC'];

        $atributos = '';

        for($i = 0; $i < count($nombreC);$i++){
            $atributos = $atributos . $nombreC[$i] . '*' . $descripcionC[$i] . '-';
        }

        $data = DB::select('call  sp_InsertarProducto(?,?,?,?,?,?,?,?,?,?,?,?,?,@id)', 
            array($titulo, $descripcion, $marca,$precioC, $precioV,$cantidad,$descuento,$estatus,$fechaA,$tag,$categoria,$proveedor,$atributos));
        $id = DB::select('select @id as id');

        return redirect()->route('producto.index')->with('status', 'Se a guardado el empleado');
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
        $producto = DB::table('producto')
            ->select('producto.idProducto','producto.titulo','producto.descripcion','producto.marca','producto.precioCompra', 
                    'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta',
                    'producto.estatus', 'producto.created_at', 'producto.idTag as tag','producto.idCategoria as categoria','producto.idProveedor as proveedor')
            ->where('producto.idProducto', '=', $id)
            ->get();
        $atributos = DB::table('atributoproducto')
            ->join('producto', 'producto.idProducto', '=', 'atributoproducto.idProducto')
            ->select('atributoproducto.titulo','atributoproducto.descripcion','atributoproducto.idAtributoProducto')
            ->where('producto.idProducto', '=', $id)
            ->get();
        $tags = DB::table('tag')
            ->select('tag.idTag','tag.tag')
            ->get();
        $categorias = DB::table('categoria')
            ->select('categoria.idCategoria','categoria.nombre')
            ->get();
        $proveedores = DB::table('proveedor')
            ->select('proveedor.idProveedor','proveedor.nombre')
            ->where('estatus','=',1)
            ->get();        

       
        return view('producto.edit', compact('producto','atributos','tags','categorias','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id 
     * 
     */
    public function update(Request $request, $id)
    {     
        $idProducto    = $request['id'];
        $titulo        = $request['titulo'];
        $descripcion   = $request['descripcion'];
        $marca         = $request['marca'];
        $cantidad      = $request['cantidad'];
        $precioC       = $request['precioC'];
        $precioV       = $request['precioV'];
        $fechaA        = date("yy-m-d");;
        $descuento     = $request['descuento'];
        $proveedor     = $request['proveedor'];
        $tag           = $request['tag'];
        $categoria     = $request['categoria'];
        $estatus       = $request['estatus'];
        $nombreC       = $request['nombreC'];
        $descripcionC  = $request['descripcionC'];

        $atributos = '';

        for($i = 0; $i < count($nombreC);$i++){
            $atributos = $atributos . $nombreC[$i] . '*' . $descripcionC[$i] . '-';
        }

        $data = DB::select('call  sp_ActualizarProducto(?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
            array($idProducto,$titulo, $descripcion, $marca,$precioC, $precioV,$cantidad,$descuento,$estatus,$fechaA,$tag,$categoria,$proveedor,$atributos));

        return redirect()->route('producto.index')->with('status', 'Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
