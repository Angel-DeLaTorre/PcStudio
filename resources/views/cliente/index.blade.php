@extends('layouts.app')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Mis Datos</h1>
@endsection
@section('content')
<div class="container">
    @include('common.successCliente')
    @include('common.errors')
    <div class="row d-flex justify-content-center">
      
        <div class="col-md-8 ">

            <div class="col-md-9 py-2">                    
                <h4>Mis Datos</h4>
            </div>

            @foreach ($cliente as $item)

                <div class="col-md-9 py-3">
                    <h5>Datos Personales</h5>                     
                </div>
            <div class="card col-md-12 ">

                <div class="card-body row">
    
                    <div class="col-md-12">
                        <label for="">Nombre: {{$item->nombre}}</label>      
                    </div>
    
                    <div class="col-md-6">     
                        <label for="">Apellido Paterno: {{$item->apellidoPaterno}}</label>
                    </div>
    
                    <div class="col-md-6">     
                        <label for="">Apellido Materno: {{$item->apellidoMaterno}}</label>
                    </div>
    
                    <div class="col-md-6">     
                        <label for="">Fecha de nacimiento: {{$item->fechaNacimiento}}</label>
                    </div>
    
                    <div class="col-md-6">     
                        <label for="">Telefono: {{$item->telefono}}</label>
                    </div>
    
                    <div class="col-md-6">     
                        <label for="">RFC: {{$item->rfc}}</label>
                    </div>
                    
                    <div class="col-md-12 row form-group py-3">
                        <div class="col-md-4">                        
                            <a href="/cliente/{{auth()->user()->id}}/edit" class="btn btn-outline-primary btn-block form-control" >Editar </a>                                            
                        </div> 
                    </div> 
                </div>
            </div>
            @endforeach


            
            <div class="col-md-9 py-3">
                <h5>Direcciones</h5>                      
            </div>                             
                    <div class="col-md-12 ">
                        @if ($direccion != null)
                            @foreach ($direccion as $item)
                                <div class="card form-group">
                                    <br>
                                    <div class="col-md-12 row  ">                   
                                        <div class="col-md-12 row">                       
                                            <div class="col-md-12 ">
                                                <div class="col-md-12">
                                                    <label for="">Codigo Postal:   {{$item->codigoPostal}}</label>  
                                                </div> 

                                                <div class="col-md-12">
                                                    <label for="">Localidad: {{$item->municipio}}, {{$item->estado}} </label>  
                                                </div> 
                                                
                                                <div class="col-md-12">
                                                    <label for="">Colonia:  {{$item->colonia}}</label> 
                                                </div> 
                                               
                                                <div class="col-md-12">
                                                    <label for="">Calle:   {{$item->calle}}</label>
                                                </div>                                                 
                                               
                                                <div class="col-md-12">
                                                    <label for="">Numero Ext:  {{$item->numeroExterno}} Numero: {{$item->numero}}</label>    
                                                </div> 
                                                
                                                <div class="col-md-12">
                                                    <label for="">Descripcion: {{$item->descripcion}}</label>
                                                </div> 

                                                <div class="col-md-12 row form-group py-3">
                                                    <div class="col-md-4">                        
                                                        <a href="/direccion/{{$item->idDireccion}}/edit" class="btn btn-outline-primary btn-block form-control" >Editar </a>                                            
                                                    </div> 
                                                <div class="col-md-4"> 
                                                        <a href="{{ route('deleteDieccion', $item->idDireccion) }}"><i class="material-icons"
                                                            style="color: #e3342f; margin-left: 15px;">delete_forever</i></a>
                                                        </div> 
                                                </div> 
                                            </div>
                                        </div>      
                                    </div>     
                                                 
                                </div>
                            @endforeach
                        @endif
                </div>    
            <div class="card  form-group">
                <br>
                <div class="col-md-12 row form-group ">                   
                    <div class="col-md-12 row">                       
                        <div class="col-md-6 ">
                            <a href="{{ url('/direccion/create') }}">Agregar Direccion</Button></a>
                        </div>
                    </div>      
                </div>                    
            </div>                              
        </div>
    </div>
</div>
   
@endsection