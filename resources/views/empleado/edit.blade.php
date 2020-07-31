@extends('layouts.app')

@section('title', 'Guardado de Empleado')
    
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                @foreach ($empleado as $item)
                <form class="form-group" method="POST" action="/empleado/{{$item->idEmpleado}}" enctype="multipart/form-data">
                    <!--CSRF Es una directiva de blade para la proteccion de la peticion
                    laravel genera un token -->  
                    @method('PUT')
                    @csrf                 
         
                <div class="col-lg-10 row">
                        
                    <div class="col-lg-10">     
                        <label for="">Nombre</label>
                    <input type="text" name="name" id="name" value="{{$item->nombre}}" class="form-control">
                    </div>

                    <div class="col-lg-6">     
                        <label for="">Apellido Paterno</label>
                    <input type="text" name="apellidoP" id="apellidoP" value="{{$item->apellidoPaterno}}" class="form-control" >
                    </div>

                    <div class="col-lg-6">     
                        <label for="">Apellido Materno</label>
                    <input type="text" name="apellidoM" id="apellidoM"  value="{{$item->apellidoMaterno}}" class="form-control" >
                    </div>

                    <div class="col-lg-6">     
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" name="fechaN" id="fechaN" value="{{$item->fechaNacimiento}}" class="form-control" >
                    </div>
                    
                    <div class="col-lg-6">     
                        <label for="">Telefono</label>
                        <input type="text" name="telefono" id="telefono" value="{{$item->telefono}}" class="form-control" >
                    </div>

                    <div class="col-lg-6">     
                        <label for="">RFC</label>
                        <input type="text" name="rfc" id="rfc" value="{{$item->rfc}}" class="form-control" >
                    </div>

                    
                </div>
                
                <div class="form-control">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>    

                @endforeach
                </div>
            </div>
        </div>
        
       
@endsection 