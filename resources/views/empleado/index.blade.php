@extends('layouts.app')

@section('title', 'tabla')
    
@section('content')

    <!--jquery para el filtro de la tabla-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#tb_Empleados tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
<div class="container">
    <div class="row">


        <div class="form-group">
                <a href="/empleado/create" class="btn btn-primary">Agregar Empleado</a>
        </div>

        <div class="col-lg-9">
            <input type="text" class="form-control" id="searchInput" aria-describedby="Buscar" placeholder="Buscar">
        </div>

        <table class="table" style="align-items: center" id="tb_Empleados">
            <thead>
                <th>Id Empleado</th>                
                <th>Codigo Empleado</th>
                <th>Nombre</th>
                <th>Apellidos</th> 
                <th>Fecha nacimiento</th>
                <th>Telefono</th>
                <th>RFC</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
            @foreach ($empleado as $item)
            <tr>
                <td>{{$item->idEmpleado}}</td>
                <td>{{$item->codigoEmpleado}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->apellidoPaterno.' '.$item->apellidoMaterno}}</td>
                <td>{{$item->fechaNacimiento}}</td>
                <td>{{$item->telefono}}</td>
                <td>{{$item->rfc}}</td>   
                <td>
                    <a href="/empleado/{{$item->idEmpleado}}/edit" class="btn btn-primary">Editar</a>
                    
                </td>
                <td><form class="form-group" method="POST" action="/empleado/{{$item->idEmpleado}}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf   
                    <button type="submit" class="btn btn-info">Eliminar</button>
                </form></td>
                
            </tr>                    
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 
