@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Datos Empleado</h1>
@endsection
@section('content')

    @foreach ($empleado as $item)
     
        <div class="card">
            <div class="card-body row">

                <div class="col-md-6">     
                    <label for=""><strong>ID</strong></label>
                    <label for="" class="form-control">{{$item->idEmpleado}}</label>
                   
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Codigo Empleado</strong></label>
                    <label for="" class="form-control">{{$item->codigoEmpleado}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Nombre</strong> </label>
                    <label for="" class="form-control">{{$item->nombre}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Apellido Paterno</strong></label>
                    <label for="" class="form-control">{{$item->apellidoPaterno}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong> Apellido Materno</strong></label>
                    <label for="" class="form-control">{{$item->apellidoMaterno}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Fecha de nacimiento</strong></label>
                    <label for="" class="form-control">{{$item->fechaNacimiento}}</label>
                </div>
                
                <div class="col-md-6">     
                    <label for=""><strong>Telefono</strong> </label>
                    <label for="" class="form-control">{{$item->telefono}}/label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>RFC</strong> </label>
                    <label for="" class="form-control">{{$item->rfc}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Email</strong> </label>
                    <label for="" class="form-control">{{$item->email}}</label>
                </div>

                <div class="col-md-6">     
                    <label for=""><strong>Estatus</strong> </label>
                    <label for="" class="form-control">{{$item->estatus}}</label>
                </div>
  

                

            </div>
                <div class="col-md-8 row">                    
                    
                    <div class="col-md-4 ">
                        <a href="/empleado" class="btn btn-outline-primary btn-block">Regresar</a>
                    </div>

                    <div class="col-md-4 ">
                    <a href="/empleado/{{$item->idEmpleado}}/edit" class="btn btn-outline-primary btn-block">Actualizar</a>
                    </div>
                </div>
                <br>
        </div>
    @endforeach
@endsection