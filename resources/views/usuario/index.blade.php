@extends('layouts.adminDashboard')


@section('module_name')
    <h1 style="color: white;" id="module_text">Usuarios</h1>
@endsection


@section('content')
    <div class="card">

        <div class="card-header">                     
            
            <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">

        </div>
        
        <div class="card-content col-md-12">
            <table class="table is-striped" id="registros">
                <thead>
                    <tr>
                        <th>id</th>                
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th> 
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->rol}}</td>
                              
                            <td>
                                <a href="/usuario/{{$item->id}}/edit"><i
                                    class="material-icons">edit</i></a>
                            </td>                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
