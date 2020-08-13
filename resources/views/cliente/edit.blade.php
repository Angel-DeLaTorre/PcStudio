@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>Mis Datos</h2>
                @foreach ($cliente as $item)                   
                
                <form class="form-group" method="POST" action="/cliente/{{$item->idCliente}}" enctype="multipart/form-data">
                    <!--CSRF Es una directiva de blade para la proteccion de la peticion
                    laravel genera un token -->  
                     
                    @method('PUT')
                    @csrf
                    <div class="card  form-group">
                    <br>
                    <div class="col-md-12 row form-group ">
                       
                            
                        <div class="col-md-6 form-group">     
                            <label for="">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$item->nombre}}" required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">Apellido Paterno</label>
                            <input type="text" name="apellidoP" id="apellidoP" value="{{$item->apellidoPaterno}}" class="form-control"  required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">Apellido Materno</label>
                            <input type="text" name="apellidoM" id="apellidoM" value="{{$item->apellidoMaterno}}" class="form-control" >
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" name="fechaN" id="fechaN" value="{{$item->fechaNacimiento}}" class="form-control" >
                        </div>
                        
                        <div class="col-md-6 form-group">     
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{$item->telefono}}" required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">RFC</label>
                            <input type="text" name="rfc" id="rfc" class="form-control" value="{{$item->rfc}}" maxlength="10">
                        </div>

                            <div class="col-md-12">
                                <div class=" col-lg-3">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>                        
                    </div>                    
                </div> 
                </form> 
                @endforeach                  
            </div>
        </div>
    </div>
@endsection
