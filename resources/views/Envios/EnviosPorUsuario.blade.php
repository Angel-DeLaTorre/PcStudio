@extends('layouts.app')

@section('content')
    <div class="container">
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
                @php
                $total = 0;
                @endphp
                @foreach ($detalle as $item)
                    @php
                    $url = 'img/productos/' . $item -> imagenUrl;
                    $total += $item -> precioVenta;
                    @endphp
                    <div class="columns">
                        <div class="column">
                            <img src="{{ url($url) }}" alt="{{ $item->titulo }}" width="150px" style="display: block;
                                            margin-left: auto;
                                            margin-right: auto;">
                        </div>
                        <div class="column">
                            <h6 class="subtitle">{{ $item->titulo }}</h6>
                        </div>
                        <div class="column">Cantidad: <strong>{{ $item->cantidad }}</strong></div>
                        <div class="column">
                            <h1 class="title is-5">$ {{ $item->cantidad * $item->precioVenta }}</h1>
                        </div>
                    </div>
                    <hr />
                @endforeach
            </div>
            <div class="card-footer" style="">
                <h1 class="title" style="float: left;">Total: $ {{ $total }} MXN</h1>
            </div>
        </div>
    </div>
@endsection
