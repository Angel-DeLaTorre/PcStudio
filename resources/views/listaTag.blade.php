@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Tags</h1>
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
                        <th scope="col">Tag</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lista as $tag)
                        <tr>
                            <td scope="row">{{$tag->idTag}}</td>
                            <td>{{$tag->tag}}</td>
                            <td>{{$tag->descripcion}}</td>

                            <td>
                                <a href="{{ route('editar', $tag) }}"><i
                                        class="material-icons">edit</i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @endsection