@extends('layouts.adminDashboard')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Crear producto</h1>
@endsection
    
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <form class="form-group" method="POST" action="/producto" enctype="multipart/form-data">
                        <!--CSRF Es una directiva de blade para la proteccion de la peticion
                        laravel genera un token -->  
                        @csrf

                    <div class="card pt-4 pb-4 pl-2 pr-2">
                        <div class="col-lg-12 row">
                            
                        <div class="col-lg-6 mb-3">     
                            <label for="">Titulo</label>
                            <input type="text" name="titulo" required id="titulo" class="form-control">
                        </div>

                        <div class="col-lg-6 mb-3">     
                            <label for="">Descripcion</label>
                            <input type="text" name="descripcion" required id="descripcion" class="form-control" >
                        </div>

                        <div class="col-lg-6 mb-3">     
                            <label for="">Marca</label>
                            <input type="text" name="marca" id="marca" required class="form-control" >
                        </div>

                        <div class="col-lg-6 mb-3">     
                            <label for="">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" required class="form-control" >
                        </div>

                        <div class="col-lg-6 mb-3">     
                            <label for="">Precio Compra</label>
                            <input type="number" name="precioC" id="precioC" required class="form-control" >
                        </div>
                        
                        <div class="col-lg-6 mb-3">     
                            <label for="">Precio venta</label>
                            <input type="number" name="precioV" id="precioV" required class="form-control" >
                        </div>

                        <div class="col-lg-6 mb-3">     
                            <label for="">Descuento</label>
                            <input type="number" name="descuento" required id="descuento" class="form-control" >
                        </div>
                        <!-- Debe de ser un select -->
                        <div class="col-lg-6 mb-3">     
                            <label for="">Proveedor</label>
                            <select name="proveedor" id="proveedor" class="form-control">
                                @foreach ($proveedores as $item)
                                    <option required value="{{$item->idProveedor}}">{{$item->nombre}}</option>        
                                @endforeach
                            </select>
                        </div>
                        <!-- Debe de ser un select -->
                        <div class="col-lg-6 mb-3">     
                            <label for="tag">Tag</label>
                            <select name="tag" id="tag" class="form-control">
                                @foreach ($tags as $item)
                                    <option required value="{{$item->idTag}}">{{$item->tag}}</option>        
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">     
                            <label for="">Categoria</label>
                            <select name="categoria" id="categoria" class="form-control">
                                @foreach ($categorias as $item)
                                    <option required value="{{$item->idCategoria}}">{{$item->nombre}}</option>        
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="estatus" id="estatus" class="form-control" value="1">
                        
                        </div>
                    </div>

                    <div class="card card pt-4 pb-4 pl-2 pr-2" id="cardImg">
                        <div class="row ml-3 mb-3">
                            <h2 class="ml-2 mt-1">Imagenes</h2>
                            <a href="javascript:new_img()" class="btn btn-outline-primary ml-5">Agregar</a>
                        </div>
                        
                        <div class="col-lg-6 row mb-3">
                            <div class="col-lg-8 col-mg-5">
                                <input type="file" name="imagenes[]" required class="form-control" accept="image/x-png,image/jpeg">
                            </div>
                        </div>
                        <div class="" id="newImg"></div>
                    </div>

                    <div class="card card pt-4 pb-4 pl-2 pr-2" id="cardAtrib">
                        <div class="row ml-3 mb-3">
                            <h2 class="ml-2 mt-1">Categorias</h2>
                            <a href="javascript:new_link()" class="btn btn-outline-primary ml-5">Agregar</a>
                        </div>
                        
                        <div class="col-lg-12 row">
                            <div class="col-lg-5 mb-3">     
                                <label for="">Nombre</label>
                                <input type="text" name="nombreC[]" id="nombreC" required class="form-control">
                            </div>

                            <div class="col-lg-5 mb-3">     
                                <label for="">Descripcion</label>
                                <input type="text" name="descripcionC[]" id="descripcionC" required class="form-control" >
                            </div>
                        </div>
                        <div class="" id="newlinktpl">

                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    
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
                    +'<a class="btn btn-primary" href="javascript:delIt('+ ct +')">Eliminar</a></div>';
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
            div1.id = ci;
            // link to delete extended form elements
            var img = 
                '<div class="col-lg-6 col-md-6 row">'
                    +'<div class="col-lg-8 col-mg-5">'
                        +'<input type="file" name="imagenes[]" required class="form-control" accept="image/x-png,image/jpeg">'
                    +'</div>'
                    +'<div class="col-lg-2 mb-3">'
                        +'<a class="btn btn-primary" href="javascript:delImg('+ ci +')">Eliminar</a>'
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