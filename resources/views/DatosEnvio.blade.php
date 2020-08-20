@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text"></h1>
@endsection

@section('content')
<div class="container">
        <div class="row ">
            <div class="col-lg-12 row">
                @foreach ($direcciones as $direccion)
                        <form class="col-lg-4" method="POST" action="/DetallesPago" enctype="multipart/form-data">
                            @csrf
                            <input hidden readonly type="text" name="txtNombre" id="txtNombre" class="form-control" value="{{$direccion->nombre}}" required>
                            <input hidden readonly type="text" name="txtApellidoPaterno" id="txtApellidoPaterno" class="form-control" value="{{$direccion->apellidoPaterno}}" required>
                            <input hidden readonly type="text" name="txtApellidoMaterno" id="txtApellidoMaterno" class="form-control" value="{{$direccion->apellidoMaterno}}">
                            <input hidden readonly type="text" name="txtCp" id="txtCp" class="form-control" value="{{$direccion->codigoPostal}}" required>
                            <input hidden readonly type="text" name="txtColonia" id="txtColonia" class="form-control" value="{{$direccion->colonia}}" required>
                            <input hidden readonly type="text" name="txtMunicipio" id="txtMunicipio" class="form-control" value="{{$direccion->municipio}}" required>
                            <input hidden readonly type="text" name="txtCalle" id="txtCalle" class="form-control" value="{{$direccion->calle}}" required>
                            <input hidden readonly type="text" name="txtNumeroInterno" id="txtNumeroInterno" class="form-control" value="{{$direccion->numero}}">
                            <input hidden readonly type="text" name="txtNumeroExterno" id="txtNumeroExterno" class="form-control" value="{{$direccion->numeroExterno}}">
                            <input hidden readonly type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="{{$direccion->telefono}}" required>
                            <textarea hidden readonly name="txtDescripcion" id="txtDescripcion" class="form-control"
                            placeholder="Descripción de la fachada, puntos de referencia para encontrarlo, indicaciones de seguridad, etc." required>
                            {{$direccion->descripcion}}
                            </textarea>
                            <input hidden readonly type="text" name="txtCliente" id="txtCliente" value="{{$direccion->idCliente}}">
                            <input hidden readonly type="text" name="txtDetalle" id="txtDetalle" value="{{$detalleCompra}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="">Direccion</h5>
                                    <p class="prop">{{$direccion->nombre}} {{$direccion->apellidoPaterno}} {{$direccion->apellidoMaterno}}</p>
                                    <p class="prop">{{$direccion->calle}} {{$direccion->numero}} - {{$direccion->numeroExterno}}</p>
                                    <p class="prop">{{$direccion->colonia}} </p>
                                    <p class="prop">{{$direccion->codigoPostal}} {{$direccion->municipio}}</p>
                                    <p class="prop">{{$direccion->telefono}}</p>
                                    <p class="prop">Descripción: {{$direccion->descripcion}}</p>
                                    <button type="submit" class="btn btn-primary mt-3">Seleccionar dirección</button>
                                </div>
                            </div>
                            
                            
                        </form>
                @endforeach
            </div>
            <div class="col-md-12 col-lg-12">
                <form class="form-group" method="POST" action="/DetallesPago" enctype="multipart/form-data">
                    
                    <!--CSRF Es una directiva de blade para la proteccion de la peticion
                    laravel genera un token -->  
                    @csrf
                    @foreach ($listaPersonaPedido as $item)
                        
                        <div class="card  form-group">
                            <h2 class="ml-4 mt-3">Agrega un domicilio</h2>
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
                                    <input type="text" name="txtNumeroExterno" id="txtNumeroExterno" class="form-control" value="{{$item->numeroExterno}}">
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Teléfono</label>
                                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="{{$item->telefono}}" required>
                                    <p>Llamarán a este número si hay algún problema en el envio</p>
                                </div>

                                <div class="col-md-6 form-group">     
                                    <label for="">Descripción de la casa</label>
                                    <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"
                                    placeholder="Descripción de la fachada, puntos de referencia para encontrarlo, indicaciones de seguridad, etc." required>{{$item->descripcion}}</textarea>
                                </div>

                                    <div class="col-md-12">
                                        <div class=" col-lg-4">
                                            <button type="submit" class="btn btn-primary">Proceder al pago</button>
                                            <a href="{{ url('/Carrito') }}" class="text-primary font-weight-bold py-3">Regresar al carrito</a>
                                        </div>
                                    </div>                        
                            </div>
                        </div>
                        <input hidden readonly type="text" name="txtCliente" id="txtCliente" value="{{$item->idCliente}}">
                        <input hidden readonly type="text" name="txtDetalle" id="txtDetalle" value="{{$detalleCompra}}">
                    @endforeach       
                </form>           
            </div>
        </div>
    </div>
@endsection 

@section('style')
    <style>
        .prop{
            margin: 0;
        }
    </style>
@endsection