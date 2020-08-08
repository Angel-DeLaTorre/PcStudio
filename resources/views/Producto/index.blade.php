@extends('layouts.adminDashboard')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ url('/producto/create') }}"><Button class="button is-primary is-outlined">Agregar</Button></a>
        <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">
    </div>
    <div class="card-body">
        <table class="table is-striped">
            <thead>
                <th>Id Producto</th>                
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Marca</th> 
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </thead>
            <tbody>
            @foreach ($producto as $item)
            <tr>
                <td>{{$item->idProducto}}</td>
                <td>{{$item->titulo}}</td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->marca}}</td>
                <td>{{$item->precioCompra}}</td>
                <td>{{$item->precioVenta}}</td>
                <td>{{$item->cantidad}}</td>   
                <td>
                    <a href="/producto/{{$item->idProducto}}/edit"><i
                        class="material-icons">edit</i></a>
                    <a href="{{ route('deleteProducto', $item->idProducto) }}"><i class="material-icons"
                        style="color: #e3342f; margin-left: 15px;">delete_forever</i></a>
                </td>
            </tr>                    
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 