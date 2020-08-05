@extends('layouts.adminDashboard')
@section('title', 'Guardado de Empleado')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Agregar proveedor</h1>
@endsection
@section('content')
    <form class="form-group" method="POST" action="/empleado" enctype="multipart/form-data">
        <!--CSRF Es una directiva de blade para la proteccion de la peticion
        laravel genera un token -->  
        @csrf
       
        <div class="card">
            <div class="col-md-6 form-group">     
                <label for=""><h2>Datos de usuario</h2></label>
            </div>
            <div class="col-md-12 row">
                
            <div class="col-md-6">
                <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail Address') }}</label>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                <div class="form-group ">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <label for="password-confirm" class="col-md-6 col-form-label ">{{ __('Confirm Password') }}</label>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="col-md-6">     
                <label for="">Tipo de persona</label>

               <div class="form-group">
                <select name="rol" id="rol"  class="form-control" required>
                    <option value="2">Empleado</option>   
                    <option value="3">Administrador</option>                                                             
                  </select>
               </div>
            </div>
            </div>
        </div>

        
        <div class="card form-group">
            
            <div class="col-md-6 form-group">     
                <label for=""><h2>Datos del Empleado</h2></label>
            </div>

            <div class="col-md-12 row form-group">
                
            <div class="col-md-6 form-group">     
                <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="col-md-6 form-group">     
                <label for="">Apellido Paterno</label>
                <input type="text" name="apellidoP" id="apellidoP" class="form-control"  required>
            </div>

            <div class="col-md-6 form-group">     
                <label for="">Apellido Materno</label>
                <input type="text" name="apellidoM" id="apellidoM" class="form-control" >
            </div>

            <div class="col-md-6 form-group">     
                <label for="">Fecha de nacimiento</label>
                <input type="date" name="fechaN" id="fechaN" class="form-control" >
            </div>
            
            <div class="col-md-6 form-group">     
                <label for="">Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>

            <div class="col-md-6 form-group">     
                <label for="">RFC</label>
                <input type="text" name="rfc" id="rfc" class="form-control" maxlength="10">
            </div>
            
            <div class="col-md-8 row">
                <div class=" col-md-4">
                    <button type="submit" class="btn btn-outline-primary btn-block">Guardar</button>
                </div>
                
                <div class="col-md-4 ">
                    <a href="/empleado" class="btn btn-outline-primary btn-block">Regresar</a>
                </div>
            </div>

            </div>
        </div>
        <br>
    </form>
@endsection
