@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Envíos</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">
        </div>
        <div class="card-body">
            <table class="table is-striped" id="registros">
                <thead>
                    <tr>
                        <th scope="col"># Compra</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $item)
                        <tr>
                            <th scope="row">{{ $item->idCompra }}</th>
                            <td>{{ $item->fechaCompra }}</td>
                            <td>{{ $item->nombreEmpleado }}</td>
                            <td>{{ $item->nombreCliente }}</td>
                            <td>@switch($item->estatus)
                                    @case(1)
                                    En preparación
                                    @break

                                    @case(2)
                                    Enviado
                                    @break

                                    @case(3)
                                    En tránsito
                                    @break

                                    @case(4)
                                    Entregado
                                    @break
                                    @default
                                    ?

                                @endswitch</td>

                            <td>
                                <a href="{{ route('editEnvio', $item->idCompra) }}"><i class="material-icons">update</i></a>
                                <a href="{{ route('detalleEnvios', $item->idCompra) }}"><i class="material-icons"
                                        style="color: #00D1B2; margin-left: 15px;">info_outline</i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
