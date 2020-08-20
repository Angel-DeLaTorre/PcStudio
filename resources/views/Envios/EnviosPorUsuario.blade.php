@extends('layouts.app')

@section('content')
    <div class="container">
        @if (!empty($detalle))
            @foreach ($detalle as $idcompra)
                @php
                $total = 0;
                $icon = "";
                @endphp
                <h1 class="title is-5" style="">Número de pedido: {{ $idcompra[0]->idCompra }}</h1>
                <div class="card" style="margin-bottom: 80px;">
                    <div class="card-header">
                        <h5 class="subtitle">Estatus del envío:
                            <strong>
                                @switch($idcompra[0]->estatus)
                                    @case(1)
                                    En preparación
                                    @php
                                    $icon = 'info_outline'
                                    @endphp
                                    @break

                                    @case(2)
                                    Enviado
                                    @php
                                    $icon = 'airplanemode_active'
                                    @endphp
                                    @break

                                    @case(3)
                                    En tránsito
                                    @php
                                    $icon = 'directions_walk'
                                    @endphp
                                    @break

                                    @case(4)
                                    Entregado
                                    @php
                                    $icon = 'check_circle'
                                    @endphp
                                    @break
                                    @default
                                    ?
                                @endswitch
                            </strong>
                        </h5>
                        <progress class="progress is-primary" value="{{ $idcompra[0]->estatus * 25 }}" max="100"></progress>
                        <i class="material-icons" style="color: #00D1B2">{{ $icon }}</i>

                    </div>
                    <div class="card-body">
                        @foreach ($idcompra as $item)
                            @php
                            $url = 'img/productos/' . $item -> imagenUrl;
                            $total += ($item->cantidad * $item->precioVenta);
                            @endphp
                            <hr />
                            <div class="columns">
                                <div class="column">
                                    <img src="{{ url($url) }}" alt="{{ $item->titulo }}" width="150px"
                                        style="display: block;
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

                        @endforeach
                    </div>
                    <div class="card-footer">
                        <h1 class="title" style="float: left;">Total: $ {{ $total }} MXN</h1>
                    </div>
                </div>
            @endforeach
        @else
            <h1 class="title">No haz realizado ningún pedido, te invitamos a <a href="{{ url('/') }}"><strong
                        style="color: #00D1B2">explorar nuestro
                        catalogo de productos</strong></a>.</h1>
        @endif
    </div>
@endsection
