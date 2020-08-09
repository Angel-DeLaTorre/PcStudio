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
    <div class="card-body container-fluid">
        <table class="table is-striped" id="productSizes">
            <thead>
                <tr class="d-flex">
                    <th class="col-1">Id Producto</th>                
                    <th class="col-5">Titulo</th>
                    <th class="col-2">Marca</th> 
                    <th class="col-1">Precio Venta</th>
                    <th class="col-1">Cantidad</th>
                    <th class="col-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($producto as $item)
            <tr class="d-flex">
                <td class="col-1">{{$item->idProducto}}</td>
                <td class="col-5">{{$item->titulo}}</td>
                <td class="col-2">{{$item->marca}}</td>
                <td class="col-1">${{$item->precioVenta}}</td>
                <td class="col-1">{{$item->cantidad}}</td>   
                <td class="col-2">
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

<style>
    td {
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
@endsection 