@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Agregar categoria de producto</h1>
@endsection
@section('content')
    <form action="/Categorias/Store" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>

                <div class="card-footer">

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary"> Guardar</button>
                </div>
            </div>
        </div>
    </form>

@endsection
