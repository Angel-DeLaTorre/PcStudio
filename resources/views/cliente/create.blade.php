@extends('layouts.appCuestionario')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>Cliente</h2>
                <form class="form-group" method="POST" action="/cliente" enctype="multipart/form-data">
                    <!--CSRF Es una directiva de blade para la proteccion de la peticion
                    laravel genera un token -->  
                    @csrf
                <div class="card  form-group">
                    <br>
                    <div class="col-md-12 row form-group ">
                       
                            
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


                        <div class="col-md-6 form-group">
                            <label for="">Tipo de persona</label>
                            <select name="tipoPersona" id="tipoPersona"  class="form-control" required>
                                <option value="1">Fisica</option>   
                                <option value="2">Moral</option>                                                             
                              </select>
                        </div>

                            <div class="col-md-12">
                                <div class=" col-lg-3">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>                        
                    </div>
                    
                    
                     <input type="hidden" name="R1" id="R1" value="{{$respuestas['R1']}}">
                     <input type="hidden" name="R2" id="R2" value="{{$respuestas['R2']}}">
                     <input type="hidden" name="R3" id="R3" value="{{$respuestas['R3']}}">
                     <input type="hidden" name="R4" id="R4" value="{{$respuestas['R4']}}">
                    
                    
                </div> 
                </form>                   
            </div>
        </div>
    </div>
@endsection
