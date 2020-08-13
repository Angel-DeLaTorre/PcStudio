@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Cambiar estatus de envío # {{ $compra[0]->idCompra }}</h1>
@endsection
@section('content')

    <form action="{{ route('updateEnvio', $compra[0]->idCompra) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-body" style="">
                <div class="control has-icons-left">
                    <div class="select is-primary is-large">
                        <select name="estatus" id="estatus">
                            <option value="{{ $compra[0]->estatus }}" selected>
                                Actual: 
                                @switch($compra[0]->estatus)
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

                                @endswitch</option>
                            <option value="1">En preparación</option>
                            <option value="2">Enviado</option>
                            <option value="3">En tránsito</option>
                            <option value="4">Entregado</option>
                        </select>
                    </div>
                    <span class="icon is-large is-left">
                        <i class="material-icons">info_outline</i>
                    </span>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="button is-primary is-outlined"> Guardar</button>
                <a href="{{ url('/Envios') }}">Regresar a la lista</a>
            </div>
        </div>
    </form>

@endsection
