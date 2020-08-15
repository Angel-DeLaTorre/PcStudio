<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

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
        
        return view('Producto.index', ['producto' => $productos]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function busqueda()
    {
        $productos = DB::table('producto')
        ->select('producto.idProducto','producto.titulo','producto.descripcion', 'producto.marca',
                'producto.precioCompra', 'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta',
                'producto.estatus', 'producto.created_at')
        ->where('estatus', '=', 1)
        ->get();
        
        return view('producto.busqueda',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        if($user->idRol == 1){
            $productos = DB::table('imagenproducto')
            ->join('producto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
            ->select('imagenproducto.imagenUrl','imagenproducto.idProducto','producto.titulo','producto.descripcion', 'producto.marca',
             'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta')
            ->get();
        

            return view('producto.busqueda',compact('productos'));
        }else{
            abort(401, 'Esta Accion no esta autorizada');
        }
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
        $imagenes      = $request['imagenes'];

        $atributos = '';

        for($i = 0; $i < count($nombreC);$i++){
            $atributos = $atributos . $nombreC[$i] . '*' . $descripcionC[$i] . '-';
        }
        $con = 1;
        $listaImg = '';
        foreach($imagenes as $imagen){
            $imageName = time().'_'.sprintf("%'03d", $con).'.'.$imagen->extension();
            $imagen->move(public_path('img/productos'), $imageName);
            $listaImg = $listaImg .$imageName . ',';
            $con++;
        }


        $data = DB::select('call  sp_InsertarProducto(?,?,?,?,?,?,?,?,?,?,?,?,?,?,@id)', 
            array($titulo, $descripcion, $marca,$precioC, $precioV,$cantidad,$descuento,$estatus,$fechaA,$tag,$categoria,$proveedor,$atributos,$listaImg));
        $id = DB::select('select @id as id');

        return redirect()->route('producto.index')->with('status', 'Se a guardado el empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $producto = DB::table('producto')
            ->join('proveedor', 'proveedor.idProveedor', '=', 'producto.idProveedor')
            ->join('categoria', 'categoria.idCategoria', '=', 'producto.idCategoria')
            ->join('tag', 'tag.idTag', '=', 'producto.idTag')
            ->select('producto.idProducto','producto.titulo','producto.descripcion','producto.marca','producto.precioCompra', 
                    'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta','producto.estatus',
                    'producto.created_at', 'tag.tag','proveedor.nombre as proveedor',
                    'categoria.nombre as categoria')
            ->where('producto.idProducto', '=', $id)
            ->get();
        $atributos = DB::table('atributoproducto')
            ->join('producto', 'producto.idProducto', '=', 'atributoproducto.idProducto')
            ->select('atributoproducto.titulo','atributoproducto.descripcion','atributoproducto.idAtributoProducto')
            ->where('atributoproducto.idProducto', '=', $id)
            ->get();
        $imagenes = DB::table('imagenproducto')
            ->join('producto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
            ->select('imagenproducto.imagenUrl')
            ->where('imagenproducto.idProducto', '=', $id)
            ->get();
        return view('producto.detail', compact('producto','atributos','imagenes'));
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
            ->where('atributoproducto.idProducto', '=', $id)
            ->get();
        $imagenes = DB::table('imagenproducto')
            ->join('producto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
            ->select('imagenproducto.imagenUrl')
            ->where('imagenproducto.idProducto', '=', $id)
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

       
        return view('producto.edit', compact('producto','atributos','tags','categorias','proveedores','imagenes'));
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
        $imagenes      = $request['imagenes'];
        $oldImagenes   = $request['oldImg'];

        $atributos = '';

        for($i = 0; $i < count($nombreC);$i++){
            $atributos = $atributos . $nombreC[$i] . '*' . $descripcionC[$i] . '-';
        }
        $con = 1;
        $listaImg = '';

        if(is_array($oldImagenes)){
            foreach($oldImagenes as $imagenURL)
            $listaImg = $listaImg .$imagenURL . ',';
        }

        if(is_array($imagenes)){
            $val = rand(00,999);
            foreach($imagenes as $imagen){
                $imageName = sprintf("%'03d", $val).'_'. time().'_'.sprintf("%'03d", $con).'.'.$imagen->extension();
                $imagen->move(public_path('img/productos'), $imageName);
                $listaImg = $listaImg .$imageName . ',';
                $con++;
            }
        }
        echo $listaImg;
        

        $data = DB::select('call  sp_ActualizarProducto(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
            array($idProducto,$titulo, $descripcion, $marca,$precioC, $precioV,$cantidad,$descuento,$estatus,$fechaA,$tag,$categoria,$proveedor,$atributos,$listaImg));

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
        $data = DB::select("UPDATE producto SET estatus = 0 WHERE idProducto = $id");
        
        echo "<script>alert('se a actualizado');</script>";
        
        return redirect()->route('producto.index')->with('status', 'El producto se a Eliminado');
    }


    public function inicio(){
        $user = Auth::user();
        if($user == null){
            echo 'Hola';
            $productos = DB::table('imagenproducto')
            ->join('producto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
            ->select('imagenproducto.imagenUrl','imagenproducto.idProducto','producto.titulo','producto.descripcion', 'producto.marca',
             'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta')
            ->get();
        }else if($user->idRol == 1){
            $productos = DB::table('imagenproducto')
            ->join('producto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
            ->join('cliente', 'producto.idTag', '=', 'cliente.idTag')
            ->join('users', 'cliente.idUsuario', '=', 'users.id')
            ->join('tag', 'tag.idTag', '=', 'producto.idTag')
            ->select('imagenproducto.imagenUrl','imagenproducto.idProducto','producto.titulo','producto.descripcion', 'producto.marca',
             'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta','tag.tag')
            ->where('users.id','=',$user->id)
            ->get();

        }else{
            abort(401, 'Esta Accion no esta autorizada');
        }

        $news = DB::table('imagenproducto')
            ->join('producto', 'producto.idProducto', '=', 'imagenproducto.idProducto')
            ->join('cliente', 'producto.idTag', '=', 'cliente.idTag')
            ->join('users', 'cliente.idUsuario', '=', 'users.id')
            ->join('tag', 'tag.idTag', '=', 'producto.idTag')
            ->select('imagenproducto.imagenUrl','imagenproducto.idProducto','producto.titulo','producto.descripcion', 'producto.marca',
             'producto.precioVenta', 'producto.cantidad', 'producto.descuentoVenta','tag.tag')
            ->orderByRaw('producto.updated_at - producto.created_at DESC')
            ->limit(6)
            ->get();

        return view('welcome',compact('productos','news'));
    }
}
