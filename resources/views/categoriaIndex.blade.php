@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Categorias de producto</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/Categorias/Create') }}"><Button class="button is-primary is-outlined">Agregar</Button></a>
            <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">
        </div>
        <div class="card-body">
            <table class="table is-striped" id="registros">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha Actualización</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                        <tr>
                            <th scope="row">{{ $item->idCategoria }}</th>
                            <td>{{ $item->nombre }}</td>
                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50ch;">
                                {{ $item->descripcion }}
                            </td>
                            <td>{{ $item->updated_at }}</td>

                            <td>
                                <a href="{{ route('editCategoria', $item->idCategoria) }}"><i
                                        class="material-icons">edit</i></a>
                                <a href="{{ route('deleteCategoria', $item->idCategoria) }}"><i class="material-icons"
                                        style="color: #e3342f; margin-left: 15px;">delete_forever</i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
