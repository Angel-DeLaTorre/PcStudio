@extends('welcome')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Tags</h1>
@endsection
@section('content')
<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 900px;
    margin: auto;
    float: right;
    text-align: left;
    font-family: arial;
  }

  .column {
    float: left;
    /*width: 50%;*/
    padding: 0 8px 20px;
  }

  .imgProducto {
    float: left;
  }

  .price {
    color: grey;
    font-size: 22px;
  }

  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  .card button:hover {
    opacity: 0.7;
  }
</style>
                @foreach($bot as $item)
                
                <div class="column">
                  <h2 style="text-align:center">Product Card</h2>
                  <div class="card">
                        <p><img clas="imgProducto" src="{{$item->imagenUrl}}" alt="Denim Jeans" style="width:50%; float: left;">
                        <h1>{{$item->idProducto}}</h1>
                        <p class="price">{{$item->marca}}</p>
                        <p>{{$item->descripcion}}</p>
                        <p><button>Agregar al carrito</button></p>
                        </p>
                  </div>
                </div>
                @endforeach
    @endsection
