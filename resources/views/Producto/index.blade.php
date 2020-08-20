@extends('layouts.adminDashboard')

<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->

@section('head')
    
@endsection

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection
@section('content')

<div class="card">
    @include('common.success')



    <div class="card-header">
        <a href="{{ url('/producto/create') }}"><Button class="button is-primary is-outlined">Agregar</Button></a>
        <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">
    </div>
    <div class="card-content col-md-12">
        <table class="table is-striped">
            <thead>
                <tr>
                    <th scope="col">Id Producto</th>                
                    <th scope="col">Titulo</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="registros">
            @foreach ($producto as $item)
            <tr>
                <td>{{$item->idProducto}}</td>
                <td>{{$item->titulo}}</td>
                <td>${{$item->precioVenta}}</td>
                <td>{{$item->cantidad}}</td>   
                <td>
                    <a href="/producto/{{$item->idProducto}}/edit"><i
                        class="material-icons">edit</i></a>
                    <a href="{{ route('deleteProducto', $item->idProducto) }}"><i class="material-icons"
                        style="color: #e3342f; margin-left: 15px;">delete_forever</i></a>
                </td>
            </tr>                    
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 

@section('script')
    <script>
    $(document).ready(function() {
        $("#exampleModal").modal('show');
        
        $("#mInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log(value);
            $("#registros tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
@stop