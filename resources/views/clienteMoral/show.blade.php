@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Datos de las Institución</h1>
@endsection
@section('content')

    @foreach ($institucion as $item)
     
        <div class="card">
            <div class="card-body row">

                <div class="col-md-6">     
                    <label for=""><strong>ID</strong></label>
                    <label for="" class="form-control">{{$item->idCliente}}</label>
                   
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Codigo Cliente</strong></label>
                    <label for="" class="form-control">{{$item->codigoCliente}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Nombre</strong> </label>
                    <label for="" class="form-control">{{$item->nombre}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Ext</strong> </label>
                    <label for="" class="form-control">{{$item->ext}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Telefono</strong> </label>
                    <label for="" class="form-control">{{$item->telefono}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>RFC</strong> </label>
                    <label for="" class="form-control">{{$item->rfc}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Nombre del Contacto</strong> </label>
                    <label for="" class="form-control">{{$item->nombreContacto}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Telefono del Contacto</strong> </label>
                    <label for="" class="form-control">{{$item->telefonoContacto}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Email del Contacto</strong> </label>
                    <label for="" class="form-control">{{$item->email}}</label>
                </div>
            

            </div>
                <div class="col-md-8 row">                    
                    
                    <div class="col-md-4 ">
                        <a href="/clienteMoral" class="btn btn-outline-primary btn-block">Regresar</a>
                    </div>

                    <div class="col-md-4 ">
                    <a href="/clienteMoral/{{$item->idPersona}}/edit" class="btn btn-outline-primary btn-block">Actualizar</a>
                    </div>
                </div>
                <br>
        </div>
    @endforeach
@endsection