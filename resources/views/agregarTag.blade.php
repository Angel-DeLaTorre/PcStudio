@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Agregar Tag</h1>
@endsection
@section('content')
    <form action="/create" method="POST">
        <div class="card">
            <div class="card-body">

                <div class="form-group">

                    <label for="nombre">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag" required>
                </div>
                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>

                <div class="card-footer">

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Guardar</button>
                    <a href="{{ url('/listaTag') }}" class="text-primary font-weight-bold py-3"
                        style="right: 5%;">Regresar a la lista</a>
                </div>
            </div>
        </div>
    </form>
@endsection