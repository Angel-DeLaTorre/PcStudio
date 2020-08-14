@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text"></h1>
@endsection

@section('content')
<div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>Agrega un domicilio</h2>
                <form class="form-group" method="POST" action="/insertarCompra" enctype="multipart/form-data">
                    <!--CSRF Es una directiva de blade para la proteccion de la peticion
                    laravel genera un token -->  
                    @csrf
                    @foreach ($listaPersonaPedido as $item)
                        <div class="card  form-group">
                            <br>
                            <div class="col-md-12 row form-group ">

                                <div class="col-md-6 form-group">     
                                    <label for="">Nombre</label>
                                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" value="{{$item->nombre}}" required>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Apellido Paterno</label>
                                    <input type="text" name="txtApellidoPaterno" id="txtApellidoPaterno" class="form-control" value="{{$item->apellidoPaterno}}" required>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Apellido Materno</label>
                                    <input type="text" name="txtApellidoMaterno" id="txtApellidoMaterno" class="form-control" value="{{$item->apellidoMaterno}}">
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Codigo Postal</label>
                                    <input type="text" name="txtCp" id="txtCp" class="form-control" value="{{$item->codigoPostal}}" required>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Colonia / Asentamiento</label>
                                    <input type="text" name="txtColonia" id="txtColonia" class="form-control" value="{{$item->colonia}}" required>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Municipio</label>
                                    <input type="text" name="txtMunicipio" id="txtMunicipio" class="form-control" value="{{$item->municipio}}" required>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Calle</label>
                                    <input type="text" name="txtCalle" id="txtCalle" class="form-control" value="{{$item->calle}}" required>
                                </div>                                

                                <div class="col-md-6 form-group">     
                                    <label for="">N° Interno</label>
                                    <input type="text" name="txtNumeroInterno" id="txtNumeroInterno" class="form-control" value="{{$item->numero}}">
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">N° Externo</label>
                                    <input type="text" name="txtNumeroExterno" id="txtNumeroExterno" class="form-control" value="{{$item->numeroExterno}}" required>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Teléfono</label>
                                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="{{$item->telefono}}" required>
                                    <p>Llamarán a este número si hay algún problema en el envio</p>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Descripción de la casa</label>
                                    <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"
                                    placeholder="Descripción de la fachada, puntos de referencia para encontrarlo, indicaciones de seguridad, etc." required>
                                    {{$item->descripcion}}
                                </textarea>
                                </div>

                                    <div class="col-md-12">
                                        <div class=" col-lg-3">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>                        
                            </div>
                        </div>
                        <input type="text" name="txtCliente" id="txtCliente" value="{{$item->idCliente}}">
                        <input type="text" name="txtDetalle" id="txtDetalle" value="{{$detalleCompra}}">
                         
                    @endforeach       
                </form>           
            </div>
        </div>
    </div>
@endsection 
