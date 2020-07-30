@extends('layouts.app')

@section('title', 'tabla')
    
@section('content')

<div class="container p-5">
    <div class="row">
        <table class="table">
            <thead>
                <th>Id Empleado</th>                
                <th>Codigo Empleado</th>
                <th>Nombre</th>
                <th>Apellidos</th> 
                <th>Fecha nacimiento</th>
                <th>Telefono</th>
                <th>RFC</th>
                <th>Editar</th>
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
                <td><a href="/empleado/{{$item->idEmpleado}}/edit" class="btn btn-primary">Editar</a></td>
                
            </tr>                    
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 
