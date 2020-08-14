@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">

                <div class="col-md-9 py-2">                    
                    <h4>Mi direccion</h4>
                </div>

                @foreach ($direccion as $item)
            <form class="form-group" method="POST" action="/direccion/{{$item->idDireccion}}" enctype="multipart/form-data">                    
                    @method('PUT')
                    @csrf
                    <div class="card  form-group">
                    <br>
                    <div class="col-md-12 row form-group ">                       
                        
                        <div class="col-md-6 form-group">     
                            <label for="">Codigo Postal</label>
                            <input type="number" name="codigoPostal" id="codigoPostal" value="{{$item->codigoPostal}}" maxlength="6"  class="form-control"  required>
                        </div>                        

                        <div class="col-md-6 form-group">     
                            <label for="">Estado</label>
                            <input type="text" name="estado" id="estado" value="{{$item->estado}}" class="form-control" >
                        </div>
                        
                        <div class="col-md-6 form-group">     
                            <label for="">Municipio</label>
                            <input type="text" name="municipio" id="municipio" value="{{$item->municipio}}" class="form-control"  required>
                        </div>

                        
                        <div class="col-md-6 form-group">     
                            <label for="">Colonia</label>
                            <input type="text" name="colonia" id="colonia" value="{{$item->colonia}}" class="form-control" required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">Calle</label>
                            <input type="text" name="calle" id="calle" value="{{$item->calle}}" class="form-control"  required>
                        </div>


                        <div class="col-md-6 form-group">     
                            <label for="">Numero</label>
                            <input type="text" name="numero" id="numero" value="{{$item->numero}}" class="form-control"  required>
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">Numero Externo</label>
                            <input type="text" name="numeroExterno" id="numeroExterno" value="{{$item->numeroExterno}}" maxlength="9" class="form-control" >
                        </div>

                        <div class="col-md-6 form-group">     
                            <label for="">Descripción</label>
                            <input type="textarea" name="descripcion" id="descripcion" value="{{$item->descripcion}}"   maxlength="198" class="form-control" required>
                        </div>

                        <div class="col-md-4 form-group">
                            <button type="submit" class="btn btn-outline-primary btn-block ">Guardar</button>                            
                        </div>

                        <div class="col-md-6 ">
                            <a href="{{ url('/cliente') }}">Regresar</Button></a>
                        </div>
                                             
                    </div>                    
                </div> 
                </form>
                @endforeach               
            </div>
        </div>
    </div>
@endsection
