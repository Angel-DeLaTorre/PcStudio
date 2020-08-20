@extends('layouts.adminDashboard')

@section('module_name')
    <h1 style="color: white;" id="module_text">Clientes</h1>
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
                        <th>Codigo</th>                        
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Telefono</th> 
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clienteAdministrativo as $item)
                        <tr>
                            <td>{{$item->codigoCliente}}</td>                               
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->apellidoPaterno.' '.$item->apellidoMaterno}}</td>
                            <td>{{$item->telefono}}</td>
                            <td>{{$item->email}}</td>   
                            <td>
                                <a href="/clienteAdministrativo/{{$item->idCliente}}/edit"><i class="material-icons">edit</i></a>                               
                            </td>                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
