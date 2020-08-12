@extends('layouts.adminDashboard')
@section('title', 'Guardado de Empleado')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Editar Institucion</h1>
@endsection
@section('content')

@foreach ($institucion as $item)
<form class="form-group" method="POST" action="/clienteMoral/{{$item->idPersona}}" enctype="multipart/form-data">
        <!--CSRF Es una directiva de blade para la proteccion de la peticion
        laravel genera un token -->  
        @method('PUT')
        @csrf
       
        
        <label for=""><h2>Datos del la institucion</h2></label>
        <div class="card form-group">
            
            <div class="col-md-6 form-group">     
            </div>

            <div class="col-md-12 row form-group">
                
                <div class="col-md-6 form-group">     
                    <label for="">Nombre de la Institucion</label>
                <input type="text" name="nameInstitucion" id="nameInstitucion" class="form-control" required value="{{$item->nombre}}">
                </div>

                <div class="col-md-6 form-group">     
                    <label for="">Telefono institucional</label>
                    <input type="text" name="telInstitucion" id="telInstitucion" class="form-control"  required value="{{$item->telefono}}">
                </div>

                <div class="col-md-6 form-group">     
                    <label for="">Extencion</label>
                    <input type="text" name="ext" id="ext" class="form-control" value="{{$item->ext}}">
                </div>

                <div class="col-md-6 form-group">     
                    <label for="">RFC de la Institucion</label>
                    <input type="text" name="rfc" id="rfc" class="form-control" maxlength="10" required  value="{{$item->rfc}}">
                </div>

             </div>
        </div>

        
        <label for=""><h2>Datos del Representante</h2></label>
        <div class="card form-group">
            
            <div class="col-md-6 form-group">     
            </div>

            <div class="col-md-12 row form-group">
                
                <div class="col-md-6 form-group">     
                    <label for="">Nombre del responsable</label>
                    <input type="text" name="nombreContacto" id="nombreContacto" class="form-control" required  value="{{$item->nombreContacto}}">
                </div>
                
                <div class="col-md-6 form-group">     
                    <label for="">Telefono contacto</label>
                    <input type="text" name="telContacto" id="telContacto" class="form-control" required value="{{$item->telefonoContacto}}">
                </div>

                <div class="col-md-6 form-group">     
                    <label for="">Email de contacto</label>
                    <input type="email" name="emailContacto" id="emailContacto" class="form-control" required value="{{$item->email}}">
                </div>

                <div class="col-md-8 row">
                    <div class=" col-md-4">
                        <button type="submit" class="btn btn-outline-primary btn-block">Guardar</button>
                    </div>
                    
                    <div class="col-md-4 ">
                        <a href="/clienteMoral" class="btn btn-outline-primary btn-block">Regresar</a>
                    </div>
                </div>

             </div>
        </div>
        <br>
    </form>
    @endforeach
@endsection
