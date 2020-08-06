@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Editar Tag {{ $tag->idTag }}</h1>
@endsection
@section('content')

    <form action="{{ route('update', $tag) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="card">
            <div class="card-body">

                <div class="form-group">

                    <label for="nombre">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag" value="{{ $tag->tag }}" readonly>
                </div>
                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                        value="{{ $tag->descripcion }}" required>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Guardar</button>
                    <a href="{{ url('/listaTag') }}" class="text-primary font-weight-bold py-3">Regresar a la lista</a>
                </div>
            </div>
        </div>
    </form>

@endsection