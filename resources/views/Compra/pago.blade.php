@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
    <?php $costo = 0; ?>
    <div class="mx-5">
        <div class="col-lg-12">
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="container pl-5">
                    <h3 class="mb-3">Detalles de productos</h3>
                    @foreach ($listaProducto as $producto)
                    <hr>
                    <div class="row my-2">
                        <div class="col-lg-3">
                            <a href="detail/{{$producto->idProducto}}">
                                <img src="{{asset('img/productos/'.$producto->imagenUrl)}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-8 ml-2 row">
                            <div class="col-lg-6">
                                <p class="cardItem">{{$producto->titulo}}</p>
                                <p class="cardItem">{{$producto->descripcion}}</p>
                                <p class="cardItem">{{$producto->marca}}</p>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <p class="cardItem">Cantidad: {{$producto->cantidad}}</p>
                                <?php
                                    $producto->descuentoVenta = 0;
                                    if ($producto->descuentoVenta > 0){
                                        $nuevoCosto = ($producto->precioVenta - ($producto->descuentoVenta * $producto->precioVenta) / 100) * $producto->cantidad;
                                        $costo = $costo + $nuevoCosto;
                                        echo '<p class="cardItem"><del>$'. number_format($producto->precioVenta,2).'</del></p>'.
                                            '<p class="cardItem text-danger"> $'.number_format($nuevoCosto,2).' ¡Precio de oferta!</p>';
                                    }else{
                                        echo '<p class="cardItem">$'.number_format($producto->precioVenta, 2).'</p>';      
                                        $costo = $costo + ($producto->precioVenta * $producto->cantidad);
                                    }
                                ?>
                            </div>
        
                            <div>
                                <div class="form-group">
                                    <input hidden type="idProducto" value="{{$producto->idProducto}}">
                                    <div class="row">
                                        
                                    </div>
                                
                                </div>
                            </div>
                                        
                        </div>
                        
                    </div> 
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <div class="">
                    <h3>Detalles de envio</h3>
                    <?php 
                        if(isset($datos)){
                    ?>
                            <form id="formPago" method="post" action="/insertarCompra">
                                @csrf
                                <input hidden type="text" name="txtNombre" id="txtNombre" class="form-control" value="{{$datos['txtNombre']}}" required>
                                <input hidden type="text" name="txtApellidoPaterno" id="txtApellidoPaterno" class="form-control" value="{{$datos['txtApellidoPaterno']}}" required>
                                <input hidden type="text" name="txtApellidoMaterno" id="txtApellidoMaterno" class="form-control" value="{{$datos['txtApellidoMaterno']}}">
                                <input hidden type="text" name="txtCp" id="txtCp" class="form-control" value="{{$datos['txtCp']}}" required>
                                <input hidden type="text" name="txtColonia" id="txtColonia" class="form-control" value="{{$datos['txtColonia']}}" required>
                                <input hidden type="text" name="txtMunicipio" id="txtMunicipio" class="form-control" value="{{$datos['txtMunicipio']}}" required>
                                <input hidden type="text" name="txtCalle" id="txtCalle" class="form-control" value="{{$datos['txtCalle']}}" required>
                                <input hidden type="text" name="txtNumeroInterno" id="txtNumeroInterno" class="form-control" value="{{$datos['txtNumeroInterno']}}">
                                <input hidden type="text" name="txtNumeroExterno" id="txtNumeroExterno" class="form-control" value="{{$datos['txtNumeroExterno']}}">
                                <input hidden type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="{{$datos['txtTelefono']}}" required>
                                <textarea  hidden name="txtDescripcion" id="txtDescripcion" class="form-control"
                                    placeholder="Descripción de la fachada, puntos de referencia para encontrarlo, indicaciones de seguridad, etc." required>
                                    {{$datos['txtDescripcion']}}
                                </textarea>
                                <input hidden readonly type="text" name="txtCliente" id="txtCliente" value="{{$datos['txtCliente']}}">
                                <input hidden readonly type="text" name="txtDetalle" id="txtDetalle" value="{{$datos['txtDetalle']}}">
                            </form>
                            <p class="dir">A nombre de: {{$datos['txtNombre']}} {{$datos['txtApellidoPaterno']}} {{$datos['txtApellidoMaterno']}}</p>
                            <p class="dir">{{$datos['txtCalle']}} #{{$datos['txtNumeroInterno']}} Ext: {{$datos['txtNumeroExterno']}}</p>
                            <p class="dir"></p>
                            <p class="dir">{{$datos['txtColonia']}} {{$datos['txtCp']}} {{$datos['txtMunicipio']}}</p>
                            <p class="dir"></p>
                            
                            <p class="dir">{{$datos['txtTelefono']}}</p>
                            <p class="dir">{{$datos['txtDescripcion']}}</p>
                    <?php
                        }
                    ?>
                </div>

                <h3 class="my-3">Realizar pago</h3>
                <div class="col-lg-10 col-md-12 col-sm-7">
                    <p class="costo"><span>Cantidad</span> a pagar: ${{number_format($costo,2)}}</p>
                    <div id="paypal-button-container"></div>
                </div>
                <input readonly hidden type="number" id="costo" value="{{$costo}}">
            </div>
        </div>
        
        
    </div>
@endsection 

@section('script')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://www.paypal.com/sdk/js?client-id=AcneIPojR0D9L1XuAnNq1gD5ZwCp4uT2Bs-W8rv5JSa9EUFTWlzKij9dJTwvXk06XRtnQ60pvbIioGIF&currency=MXN"></script>
    <script src="{{ asset('js/paypal.js') }}"></script>
@endsection

@section('style')
    <style>
        .dir{
            font-size: 1.2em;
            margin: 0;
        }
        .cardItem{
            margin: 0 0 .4em 0;
            font-size: 1.2em;
        }
        .costo{
            font-size: 1.5em;
        }
    </style>
@endsection