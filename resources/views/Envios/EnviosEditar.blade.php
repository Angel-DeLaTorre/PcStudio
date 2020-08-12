@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Editar Compra # {{ $compra->idCompra }}</h1>
@endsection
@section('content')

    <form action="{{ route('updateEnvio', $compra->idCompra) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="control has-icons-left">
                    <div class="select is-large">
                        <select>
                            <option selected>Country</option>
                            <option>Select dropdown</option>
                            <option>With options</option>
                        </select>
                    </div>
                    <span class="icon is-large is-left">
                        <i class="material-icons">info_outline</i>
                    </span>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary"> Guardar</button>
                <a href="{{ url('/Envios') }}" class="text-primary font-weight-bold py-3">Regresar a la lista</a>
            </div>
        </div>
    </form>

@endsection
