@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Detalle compras</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">

        </div>
        <div class="card-content">
            <table class="table is-striped" id="registros">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre del cliente</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Id cliente</th>
                        <th scope="col">Fecha compra</th>
                        <th scope="col">Id Empleado</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Costo del producto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listaDetalleCompra as $item)
                        <tr>
                            <td scope="row">{{$item->idCompra}}</td>
                            <td scope="row">{{$item->nombre}}<p> </p>{{$item->apellidoPaterno}}<p> </p>{{$item->apellidoMaterno}}</td>
                            <td scope="row">{{$item->telefono}}</td>
                            <td scope="row">{{$item->idCliente}}</td>
                            <td scope="row">{{$item->fechaCompra}}</td>
                            <td scope="row">{{$item->idEmpleado}}</td>
                            <td scope="row">{{$item->titulo}}</td>
                            <td scope="row">{{$item->cantidad}}</td>
                            <td scope="row">{{$item->costo}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @endsection