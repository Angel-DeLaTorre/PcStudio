@extends('layouts.adminDashboard')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Editar producto</h1>
@endsection
    
@section('content')

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-group" method="POST" action="/producto/{{$producto[0]->idProducto}}" enctype="multipart/form-data">
                    <!--CSRF Es una directiva de blade para la proteccion de la peticion
                    laravel genera un token -->  
                    @csrf
                    {{ method_field('PUT') }}


                <div class="card pt-4 pb-4 pl-2 pr-2">
                    <div class="col-lg-12 row">

                    <input type="text" hidden name="id" id="id" class="form-control" value="{{$producto[0]->idProducto}}">
                        
                    <div class="col-lg-6 mb-3">     
                        <label for="">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required value="{{$producto[0]->titulo}}">
                    </div>

                    <div class="col-lg-6 mb-3">     
                        <label for="">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required value="{{$producto[0]->descripcion}}">
                    </div>

                    <div class="col-lg-6 mb-3">     
                        <label for="">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control" required value="{{$producto[0]->marca}}">
                    </div>

                    <div class="col-lg-6 mb-3">     
                        <label for="">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" required value="{{$producto[0]->cantidad}}">
                    </div>

                    <div class="col-lg-6 mb-3">     
                        <label for="">Precio Compra</label>
                        <input type="number" name="precioC" id="precioC" class="form-control" required value="{{$producto[0]->precioCompra}}">
                    </div>
                    
                    <div class="col-lg-6 mb-3">     
                        <label for="">Precio venta</label>
                        <input type="number" name="precioV" id="precioV" class="form-control" required value="{{$producto[0]->precioVenta}}">
                    </div>

                    <div class="col-lg-6 mb-3">     
                        <label for="">Descuento</label>
                        <input type="number" name="descuento" id="descuento" class="form-control" required value="{{$producto[0]->descuentoVenta}}">
                    </div>
                    <!-- Debe de ser un select -->
                    <div class="col-lg-6 mb-3">     
                        <label for="">Proveedor</label>
                        <select name="proveedor" id="proveedor" class="form-control">
                            @foreach ($proveedores as $item)
                                <option value="{{$item->idProveedor}}" 
                                    @if ($item->idProveedor == $producto[0]->proveedor)
                                    selected
                                    @endif>{{$item->nombre}}</option>        
                            @endforeach
                        </select>
                    </div>
                    <!-- Debe de ser un select -->
                    <div class="col-lg-6 mb-3">     
                        <label for="tag">Tag</label>
                        <select name="tag" id="tag" class="form-control">
                            @foreach ($tags as $item)
                                <option value="{{$item->idTag}}" 
                                    @if ($item->idTag == $producto[0]->tag)
                                        selected
                                    @endif>{{$item->tag}}</option>        
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 mb-3">     
                        <label for="">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control">
                            @foreach ($categorias as $item)
                                <option value="{{$item->idCategoria}}" 
                                    @if ($item->idCategoria == $producto[0]->categoria)
                                        selected
                                    @endif>{{$item->nombre}}</option>        
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="estatus" id="estatus" class="form-control" value="1">
                    
                    </div>
                </div>

                <div class="card card pt-4 pb-4 pl-2 pr-2" >
                    <div class="row ml-3 mb-3">
                        <h2 class="ml-2 mt-1">Imagenes</h2>
                        <a href="javascript:new_img()" class="btn btn-outline-primary ml-5">Agregar</a>
                    </div>
                    <div class="row ml-3 mb-4" id="cardImg">
                        <div class="" id="newImg"></div>
                        <?php $title = 10001 ?>
                        @foreach ($imagenes as $img)
                            <div id="<?php echo $title ?>" class="col-lg-4 col-md-6 col-sm-8 col mb-2">
                                <div class="col-12  mb-1 ">
                                    <img src="{{asset('img/productos/'.$img->imagenUrl)}}" alt="Imagen producto">
                                    <input hidden type="text" name="oldImg[]" id="oldImg" class="form-control" value="{{$img->imagenUrl}}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-outline-danger" href="javascript:delImg(<?php echo $title ?>)">Eliminar</a>
                                </div>
                            </div>
                            <?php $title++ ?>
                        @endforeach
                    </div>
                </div>

                <div class="card card pt-4 pb-4 pl-2 pr-2" id="cardAtrib">
                    <div class="row ml-3 mb-3">
                        <h2 class="ml-2 mt-1">Categorias</h2>
                        <a href="javascript:new_link()" class="btn btn-outline-primary ml-5">Agregar</a>
                    </div>
                    <div class="" id="newlinktpl"></div>
                    <?php $title = 10001 ?>
                    @foreach ($atributos as $item)
                        <div id="<?php echo $title ?>" class="col-lg-12 row">
                            <div class="col-lg-5 mb-3">     
                                <label for="">Nombre</label>
                                <input type="text" name="nombreC[]" id="nombreC" class="form-control" value="{{$item->titulo}}" >
                            </div>

                            <div class="col-lg-5 mb-3">     
                                <label for="">Descripcion</label>
                                <input type="text" name="descripcionC[]" id="descripcionC" class="form-control" value="{{$item->descripcion}}">
                                <input hidden type="text" name="idC[]" id="idC" class="form-control" value="{{$item->idAtributoProducto}}">
                            </div>
                            <div class="col-lg-2 mb-3 pt-4">
                                <a class="btn btn-outline-danger" href="javascript:delIt(<?php echo $title ?>)">Eliminar</a>
                            </div>
                        </div>
                        <?php $title++ ?>
                    @endforeach 
                    
                </div>
                <br>
                <button type="submit" class="btn btn-primary ml-3">Guardar</button>
            </form>               
            </div>
        </div>
    </div>  
@endsection 
@section('script')

    <script>
        var ct = 1;
        var ci = 1;
        function new_link()
        {
            ct++;
            var div1 = document.createElement('div');
            div1.id = ct;
            // link to delete extended form elements
            var delLink = '<div class="col-lg-12 row">'
                +'<div class="col-lg-5 mb-3">'
                    +'<label for="">Nombre</label>'
                    +'<input type="text" name="nombreC[]" id="nombreC" required class="form-control">'
                +'</div>'
                +'<div class="col-lg-5 mb-3">'
                    +'<label for="">Descripcion</label>'
                    +'<input type="text" name="descripcionC[]" id="descripcionC" required class="form-control" >'
                +'</div>'
                +'<div class="col-lg-2 mb-3 pt-4">'
                    +'<a class="btn btn-outline-danger" href="javascript:delIt('+ ct +')">Eliminar</a></div>';
                +'</div>'
            div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            document.getElementById('cardAtrib').appendChild(div1);
        }
        // function to delete the newly added set of elements
        function delIt(eleId)
        {
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('cardAtrib');
            parentEle.removeChild(ele);
        }

        function new_img()
        {
            ci++;
            var div1 = document.createElement('div');
            div1.className = "col-lg-6 col-md-6 col-sm-8";
            div1.id = ci;
            // link to delete extended form elements
            var img = '<div class="row ml-4 mb-2">'
                    +'<div class="">'
                        +'<input type="file" name="imagenes[]" required class="form-control" accept="image/x-png,image/jpeg,image/webp">'
                    +'</div>'
                    +'<div class="ml-3">'
                        +'<a class="btn btn-outline-danger" href="javascript:delImg('+ ci +')">Eliminar</a>'
                    +'</div>'
                +'</div>';
            div1.innerHTML = document.getElementById('newImg').innerHTML + img;
            document.getElementById('cardImg').appendChild(div1);
        }
        // function to delete the newly added set of elements
        function delImg(id)
        {
            d = document;
            var ele = d.getElementById(id);
            var parentEle = d.getElementById('cardImg');
            parentEle.removeChild(ele);
        }

    </script>

@stop