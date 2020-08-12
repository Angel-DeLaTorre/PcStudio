@extends('layouts.adminDashboard')

@section('module_name')
    <h1 style="color: white;" id="module_text">Institucion</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            
            <a href="{{ url('/clienteMoral/create') }}"><Button class="btn btn-outline-primary btn-block">Agregar</Button></a>

            <input class="input" type="text" placeholder="Ingrese su búsqueda" id="mInput">

        </div>
        <div class="card-content col-md-12">
            <table class="table is-striped" id="registros">
                <thead>
                    <tr>
                        <th>Institucion</th>  
                        <th>Codigo</th>                        
                        <th>RFC</th>
                        <th>Contacto</th>
                        <th>Telefono</th> 
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($institucion as $item)
                        <tr>    
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->codigoCliente}}</td>
                            <td>{{$item->rfc}}</td>
                            <td>{{$item->nombreContacto}}</td>
                            <td>{{$item->telefonoContacto}}</td>
                            <td>{{$item->email}}</td>   
                            <td>
                                <a href="/clienteMoral/{{$item->idPersona}}/edit"><i class="material-icons">edit</i></a>
                                <a href="{{ route('deleteCliente', $item->idCliente) }}"><i class="material-icons"
                                    style="color: #e3342f; margin-left: 15px;">delete_forever</i></a>
                                <!--<a href="/clienteMoral/{{$item->idPersona}}"><i class="material-icons">show</i></a>-->
                               
                            </td>                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
