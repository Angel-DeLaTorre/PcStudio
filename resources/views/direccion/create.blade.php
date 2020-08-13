@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>Mi direccion</h2>                 
                
                <form class="form-group" method="POST" action="/direccion" enctype="multipart/form-data">
                    <!--CSRF Es una directiva de blade para la proteccion de la peticion
                    laravel genera un token -->  
                    @csrf
                    <div class="card  form-group">
                    <br>
                    <div class="col-md-12 row form-group ">
                       
                            
                        <div class="col-md-6 form-group">     
                            <label for="">codigo Postal</label>
                        <input type="text" name="codigoPostal" id="codigoPostal" class="form-control" required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">calle</label>
                            <input type="text" name="calle" id="calle" value="{{$item->apellidoPaterno}}" class="form-control"  required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">colonia</label>
                            <input type="text" name="colonia" id="colonia" value="{{$item->apellidoMaterno}}" class="form-control" >
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">estado</label>
                            <input type="date" name="estado" id="estado" value="{{$item->fechaNacimiento}}" class="form-control" >
                        </div>
                        
                        <div class="col-md-6 form-group">     
                            <label for="">municipio</label>
                            <input type="text" name="municipio" id="municipio" class="form-control" value="{{$item->telefono}}" required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">descripcion</label>
                            <input type="textarea" name="descripcion" id="descripcion" class="form-control" value="{{$item->rfc}}" maxlength="10">
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">numero</label>
                            <input type="text" name="numero" id="numero" class="form-control" value="{{$item->telefono}}" required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">numeroExterno</label>
                            <input type="text" name="numeroExterno" id="numeroExterno" class="form-control" value="{{$item->telefono}}" required>
                        </div>

                            <div class="col-md-12">
                                <div class=" col-lg-3">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>                        
                    </div>                    
                </div> 
                </form>               
            </div>
        </div>
    </div>
@endsection
