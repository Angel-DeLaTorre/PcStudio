@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Agregar proveedor</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ url('/Proveedores') }}" class="text-primary font-weight-bold py-3">Regresar a la lista</a>
                <div class="py-3">
                    <form action="/Proveedores/Store" method="POST">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                {{ csrf_field() /*Para evitar manipulación de formularios*/}}
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
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
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
