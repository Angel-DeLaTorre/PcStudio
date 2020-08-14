@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Editar empleado</h1>
@endsection
@section('content')

    @foreach ($empleado as $item)
    <form class="form-group" method="POST" action="/empleado/{{$item->idEmpleado}}" enctype="multipart/form-data">
        <!--CSRF Es una directiva de blade para la proteccion de la peticion
        laravel genera un token -->  
        @method('PUT')
        @csrf   
        <div class="card">
            <div class="card-body row">

                <div class="col-md-6">     
                    <label for="">Nombre</label>
                <input type="text" name="name" id="name" value="{{$item->nombre}}" class="form-control" required>
                </div>

                <div class="col-md-6">     
                    <label for="">Apellido Paterno</label>
                <input type="text" name="apellidoP" id="apellidoP" value="{{$item->apellidoPaterno}}" class="form-control" required>
                </div>

                <div class="col-md-6">     
                    <label for="">Apellido Materno</label>
                <input type="text" name="apellidoM" id="apellidoM"  value="{{$item->apellidoMaterno}}" class="form-control" >
                </div>

                <div class="col-md-6">     
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" name="fechaN" id="fechaN" value="{{$item->fechaNacimiento}}" class="form-control" >
                </div>
                
                <div class="col-md-6">     
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" id="telefono" value="{{$item->telefono}}" class="form-control" required>
                </div>

                <div class="col-md-6">     
                    <label for="">RFC</label>
                    <input type="text" name="rfc" id="rfc" value="{{$item->rfc}}" class="form-control" >
                </div>

            </div>
                <div class="col-md-8 row">
                    <div class=" col-md-4">
                        <button type="submit" class="btn btn-outline-primary btn-block">Guardar</button>
                    </div>
                    
                    <div class="col-md-4 ">
                        <a href="/empleado" class="btn btn-outline-primary btn-block">Regresar</a>
                    </div>
                </div>
                <br>
        </div>
    </form>
    @endforeach
@endsection