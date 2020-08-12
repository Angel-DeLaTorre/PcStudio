@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Envío # {{ $detalle[0]->idCompra }}</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="subtitle">Estatus del envío:
                <strong>@switch($detalle[0]->estatus)
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

                    @endswitch</strong>
            </h5>
            <progress class="progress is-primary" value="{{ $detalle[0]->estatus * 25 }}" max="100">Hola</progress>
        </div>
        <div class="card-body">
            @foreach ($detalle as $item)
                <div class="columns">
                    <div class="column"><h6 class="subtitle">{{ $item -> titulo }}</h6></div>
                    <div class="column">Cantidad: <strong>{{ $item -> cantidad }}</strong></div>
                    <div class="column"><h1 class="title is-5">$ {{ ($item -> cantidad) * ($item -> precioVenta) }}</h1></div>
                </div>
                <hr />
            @endforeach
        </div>
        <div class="card-footer">
            <a href="{{ url('/Envios') }}"><Button class="button is-primary is-outlined">OK</Button></a>

        </div>
    </div>
@endsection
