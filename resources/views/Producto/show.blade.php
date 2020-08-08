@extends('layouts.app')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        @foreach ($producto as $item)
            <td>{{$item->idProducto}}</td>
            <td>{{$item->titulo}}</td>
            <td>{{$item->descripcion}}</td>
            <td>{{$item->marca}}</td>
            <td>{{$item->precioCompra}}</td>
            <td>{{$item->precioVenta}}</td>
            <td>{{$item->tag}}</td>
            <td>{{$item->categoria}}</td>
            <td>{{$item->proveedor}}</td>
        @endforeach
        @foreach ($imagenes as $img)
            <td>{{$img->imagenUrl}}</td>
        @endforeach
        @foreach ($atributos as $atrib)
            <td>{{$atrib->titulo}}</td>
            <td>{{$atrib->descripcion}}</td>
        @endforeach

    </div>
</div>
@endsection 