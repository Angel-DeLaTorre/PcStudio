@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Editar Cliente</h1>
@endsection

@section('content')

@foreach ($clienteAdministrativo as $item)
<form class="form-group" method="POST" action="/clienteAdministrativo/{{$item->idCliente}}" enctype="multipart/form-data">
        <!--CSRF Es una directiva de blade para la proteccion de la peticion
        laravel genera un token -->  
        @method('PUT')
        @csrf
       
        
        <div class="card form-group">
            
            <div class="col-md-6 form-group">     
                <label for=""><h2>Datos del Cliente</h2></label>
            </div>

            <div class="col-md-12 row form-group">
                
                <div class="col-md-6 form-group">     
                    <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$item->nombre}}" required>
                </div>

                <div class="col-md-6 form-group">     
                    <label for="">Apellido Paterno</label>
                    <input type="text" name="apellidoP" id="apellidoP" class="form-control" value="{{$item->apellidoPaterno}}" required>
                </div>

                <div class="col-md-6 form-group">     
                    <label for="">Apellido Materno</label>
                    <input type="text" name="apellidoM" id="apellidoM"  value="{{$item->apellidoMaterno}}" class="form-control" >
                </div>

                <div class="col-md-6 form-group">     
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" name="fechaN" id="fechaN" value="{{$item->fechaNacimiento}}" class="form-control" >
                </div>
                
                <div class="col-md-6 form-group">     
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" id="telefono" value="{{$item->telefono}}" class="form-control" required>
                </div>
                
                
                <div class="col-md-8 row">
                    <div class=" col-md-4">
                        <button type="submit" class="btn btn-outline-primary btn-block">Guardar</button>
                    </div>
                    
                    <div class="col-md-4 ">
                        <a href="/clienteAdministrativo" class="btn btn-outline-primary btn-block">Regresar</a>
                    </div>
                </div>

             </div>
        </div>
        <br>
    </form>
    @endforeach
@endsection
