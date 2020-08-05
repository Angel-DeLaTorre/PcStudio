@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Editar categoria {{ $categoria->idCategoria }}</h1>
@endsection
@section('content')
    <div class="container">
        <a href="{{ url('/Categorias') }}" class="text-primary font-weight-bold py-3">Regresar a la lista</a>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('updateCategoria', $categoria->idCategoria) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ $categoria->nombre }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                    value="{{ $categoria->descripcion }}">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
