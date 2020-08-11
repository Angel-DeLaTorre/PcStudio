@extends('layouts.app')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection
@section('content')

<div class="card container">
    <div class="card-body row" id="detalleProducto">
        <div class="galeria col-lg-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="">
                    <?php $i = true; ?>
                    @foreach ($imagenes as $img)
                        <div class="carousel-item <?php if($i){ echo 'active';$i = false;} ?>">
                            <img src="{{asset('img/productos/'.$img->imagenUrl)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="descip col-lg-4">
            <div class="row">

            </div>
            @foreach ($producto as $item)
                <b>{{$item->idProducto}}</b>
                <p>{{$item->titulo}}</p>
                <p>{{$item->descripcion}}</p>
                <p>{{$item->marca}}</p>
                <p>{{$item->precioCompra}}</p>
                <p>{{$item->precioVenta}}</p>
                <p>{{$item->tag}}</p>
                <p>{{$item->categoria}}</p>
                <p>{{$item->proveedor}}</p>
            @endforeach

            @foreach ($atributos as $atrib)
                <p>{{$atrib->titulo}}</p>
                <p>{{$atrib->descripcion}}</p>
            @endforeach
        </div>
        <div class="acciones col-lg-2">

        </div>

    </div>
</div>
@endsection 