@extends('layouts.app')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('content')

<div class="card">
    <div class="card-body container" >
        <h1>Lista de productos</h1>
        @foreach ($bot as $item)
        <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="col-lg-3">
                <a href="detail/{{$item->idProducto}}">
                    <img src="{{asset('img/productos/'.$item->imagenUrl)}}" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <a href="detail/{{$item->idProducto}}"><h2>{{$item->titulo}}</h2></a>
                <p>{{$item->descripcion}}</p>
                <p>{{$item->marca}}</p>
                <div class="row ml-1">
                    <?php 
                        if ($item->descuentoVenta > 0){
                            $nuevoCosto = ($item->precioVenta - ($item->descuentoVenta * $item->precioVenta) / 100);
                            echo '<h3><del>$'.$item->precioVenta.'</del></h3>'.
                                '<h3 class="text-danger ml-2"> $'.$nuevoCosto.' ¡Precio de oferta!</h3>';
                        }else{
                            echo '<h3>$'.$item->precioVenta.'</h3>';        
                        } 
                        if ($item->cantidad <= 0){
                            echo '<h3 class="ml-4 text-danger">Agotado</h3>';
                        }
                    ?>
                </div>
            </div>
            
            <form hidden class="form-group col-lg-0" method="POST" action="/indexProducto" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idProducto" id="idProducto" value="{{$item->idProducto}}" />
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