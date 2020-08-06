@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Proveedores</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/Proveedores/Create') }}"><Button class="button is-primary is-outlined">Agregar</Button></a>

            <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">

        </div>
        <div class="card-body">
            <table class="table is-striped" id="registros">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Fecha Actualización</th>
                        <th scope="col">Fecha Creación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $item)
                        <tr>
                            <th scope="row">{{ $item->idProveedor }}</th>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->estatus }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>{{ $item->created_at }}</td>

                            <td>
                                <a href="{{ route('editProveedor', $item->idProveedor) }}"><i
                                        class="material-icons">edit</i></a>
                                <a href="{{ route('deleteProveedor', $item->idProveedor) }}"><i class="material-icons"
                                        style="color: #e3342f; margin-left: 15px;">delete_forever</i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
