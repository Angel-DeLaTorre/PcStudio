@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Editar empleado</h1>
@endsection
@section('content')

    @foreach ($usuario as $item)
    <form class="form-group" method="POST" action="/usuario/{{$item->id}}" enctype="multipart/form-data">
        <!--CSRF Es una directiva de blade para la proteccion de la peticion
        laravel genera un token -->  
        @method('PUT')
        @csrf   
        <div class="card">
            <div class="card-body row">

                <div class="col-md-6">     
                    <label for="">ID</label>
                    <div class="form-group">
                <input type="text" name="id" id="id" value="{{$item->id}}" readonly  class="form-control">
                </div>    
            </div>

                <div class="col-md-6">     
                    <label for="">Nombre</label>
                    <div class="form-group">
                        <input type="text" name="name" id="name" value="{{$item->name}}" class="form-control" required>
                    </div>
              
                </div>

                <div class="col-md-6">
                    <label for="email">{{ __('E-Mail Address') }}</label>
    
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$item->email}}" required autocomplete="email">
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">     
                    <label for="">Contraseña</label>
                    <div class="form-group">
                    <input type="text" name="password" id="password"  class="form-control">
                </div>
                </div>

                <div class="col-md-6">     
                    <label for="">Rol</label>
                    <div class="form-group">
                    <input type="text" name="rol" id="rol" value="{{$item->rol}}"   class="form-control" required>
                    </div>
                </div>

            </div>
                <div class="col-md-8 row">
                    <div class=" col-md-4">
                        <button type="submit" class="btn btn-outline-primary btn-block">Guardar</button>
                    </div>
                    
                    <div class="col-md-4 ">
                        <a href="/usuario" class="btn btn-outline-primary btn-block">Regresar</a>
                    </div>
                </div>
                <br>
        </div>
    </form>
    @endforeach
@endsection