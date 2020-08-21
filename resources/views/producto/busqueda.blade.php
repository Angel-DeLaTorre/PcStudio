@extends('layouts.app')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('content')

    <div class="container">
        @if (!empty($productos))
            <h1>Nuestros de productos</h1>
            @foreach ($productos as $producto)
                <div class="row shadow p-3 mb-5 bg-white rounded">
                    <div class="col-lg-3">
                        <a href="detail/{{ $producto->idProducto }}">
                            <img src="{{ asset('img/productos/' . $producto->imagenUrl) }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <a href="detail/{{ $producto->idProducto }}">
                            <h2>{{ $producto->titulo }}</h2>
                        </a>
                        <p>{{ $producto->descripcion }}</p>
                        <p>{{ $producto->marca }}</p>
                        <div class="row ml-1">
                            <?php
                            if ($producto->descuentoVenta > 0) {
                            $nuevoCosto = $producto->precioVenta - ($producto->descuentoVenta * $producto->precioVenta) /
                            100;
                            echo '<h3><del>$' .
                                    number_format($producto->precioVenta, 2) .
                                    '</del></h3>' .
                            '<h3 class="text-danger ml-2">
                                $' .
                                number_format($nuevoCosto, 2) .
                                ' ¡Precio de oferta!</h3>';
                            } else {
                            echo '<h3>$' . number_format($producto->precioVenta, 2) . ' MXN</h3>';
                            }
                            if ($producto->cantidad <= 0) { echo '<h3 class="ml-4 text-danger">Agotado</h3>' ; } ?> </div>
                        </div>

                        <form hidden class="form-group col-lg-0" method="POST" action="/indexProducto"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idProducto" id="idProducto" value="{{ $producto->idProducto }}" />
                            <input type="number" value="1" name="cantidad" id="cantidad" hidden />
                            <input type="text" value="producto/lista" name="ruta" id="ruta" hidden />
                            <input type="submit" value="Agregar al carrito" class="btn btn-primary" />
                        </form>
                    </div>
                    <hr>
            @endforeach
        @else
            <h1 class="title">No se ha encontrado ninguna coincidencia, te invitamos a <a href="{{ url('/') }}"><strong
                        style="color: #00D1B2">explorar nuestro
                        catalogo de productos</strong></a>.</h1>
        @endif
    </div>
@endsection
