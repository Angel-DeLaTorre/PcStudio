@extends('layouts.app')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('content')

<div class="card">
    <div class="card-body container" > 
        <h1>Nuestros de productos</h1>
        @foreach ($productos as $producto)
        <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="col-lg-3">
                <a href="detail/{{$producto->idProducto}}">
                    <img src="{{asset('img/productos/'.$producto->imagenUrl)}}" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <a href="detail/{{$producto->idProducto}}"><h2>{{$producto->titulo}}</h2></a>
                <p>{{$producto->descripcion}}</p>
                <p>{{$producto->marca}}</p>
                <div class="row ml-1">
                    <?php 
                        if ($producto->descuentoVenta > 0){
                            $nuevoCosto = ($producto->precioVenta - ($producto->descuentoVenta * $producto->precioVenta) / 100);
                            echo '<h3><del>$'.$producto->precioVenta.'</del></h3>'.
                                '<h3 class="text-danger ml-2"> $'.$nuevoCosto.' ¡Precio de oferta!</h3>';
                        }else{
                            echo '<h3>$'.$producto->precioVenta.'</h3>';        
                        } 
                        if ($producto->cantidad <= 0){
                            echo '<h3 class="ml-4 text-danger">Agotado</h3>';
                        }
                    ?>
                </div>
            </div>
            
            <form hidden class="form-group col-lg-0" method="POST" action="/indexProducto" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idProducto" id="idProducto" value="{{$producto->idProducto}}" />
                <input type="number" value="1" name="cantidad" id="cantidad" hidden/>
                <input type="text" value="producto/lista" name="ruta" id="ruta" hidden/>
                <input type="submit" value="Agregar al carrito" class="btn btn-primary" />
            </form>
        </div>
        <hr>
        @endforeach
    </div>
</div>
@endsection 