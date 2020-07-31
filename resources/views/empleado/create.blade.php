@extends('layouts.app')

@section('title', 'Guardado de Empleado')
    
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <form class="form-group" method="POST" action="/empleado" enctype="multipart/form-data">
                        <!--CSRF Es una directiva de blade para la proteccion de la peticion
                        laravel genera un token -->  
                        @csrf

                    <div class="card">
                        <div class="col-lg-12 row">
                            
                        <div class="col-lg-6">
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

                        <div class="col-lg-6">
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

                        <div class="col-lg-6">
                            <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-lg-6">     
                            <label for="">Tipo de persona</label>
                            <select name="tipoPersona" id="tipoPersona"  class="form-control">
                                <option value="2">Empleado</option>   
                                <option value="1">Administrador</option>                                                             
                              </select>
                        </div>
                        </div>
                    </div>
                    <br>


                    <div class="card">
                        <div class="col-lg-12 row">
                            
                        <div class="col-lg-6">     
                            <label for="">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="col-lg-6">     
                            <label for="">Apellido Paterno</label>
                            <input type="text" name="apellidoP" id="apellidoP" class="form-control" >
                        </div>

                        <div class="col-lg-6">     
                            <label for="">Apellido Materno</label>
                            <input type="text" name="apellidoM" id="apellidoM" class="form-control" >
                        </div>

                        <div class="col-lg-6">     
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" name="fechaN" id="fechaN" class="form-control" >
                        </div>
                        
                        <div class="col-lg-6">     
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" >
                        </div>

                        <div class="col-lg-6">     
                            <label for="">RFC</label>
                            <input type="text" name="rfc" id="rfc" class="form-control" >
                        </div>


                        <br>
                        <br>
                        <br>
                        <input type="hidden" name="estatus" id="estatus" class="form-control" value="1">
                        
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>                    
                </div>
            </div>
        </div>
        
       
@endsection 