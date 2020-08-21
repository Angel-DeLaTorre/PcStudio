@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
<body onload="mostrarSeleccionado()">
    <div class="card container">
        <div class="card-body row" id="detalleProducto">
            <div class="galeria col-lg-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="">
                        <?php $i = true; ?>
                        @foreach ($imagenes as $img)
                            <div class="carousel-item <?php if ($i) {
                                    echo 'active';
                                    $i = false;
                                } ?>">
                                <img src="{{ asset('img/productos/' . $img->imagenUrl) }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="descip col-lg-4">
                <div class="row">

                </div>
                @foreach ($producto as $item)
                    <h1>{{ $item->titulo }}</h1>
                    <p class="desc">{{ $item->descripcion }}</p>
                    <p class="desc">Marca: {{ $item->marca }}</p>
                    <p class="desc">Proveedor :{{ $item->proveedor }}</p>

                    <span class="tagDetail">#{{ $item->tag }}</span>
                    <span class="tagDetail">#{{ $item->categoria }}</span>
                @endforeach
                <hr>
                <h3>Caracteristicas</h3>
                @foreach ($atributos as $atrib)
                    <p><b>{{ $atrib->titulo }}</b>: {{ $atrib->descripcion }}</p>
                @endforeach
            </div>
            <div class="acciones col-lg-3">
                <div class=" ml-1">

                    @if ($item->descuentoVenta > 0)
                        {{ $nuevoCosto = $item->precioVenta - ($item->descuentoVenta * $item->precioVenta) / 100 }}
                        <p class="costo"><del>${{ number_format($item->precioVenta, 2) }}</del></p>
                        <p class="costo oferta">${{ number_format($nuevoCosto) }}</p>
                        <p class="costo oferta">Precio de oferta</p>
                        <input type="hidden" id="txtPrecio" value="{{ $nuevoCosto }}">
                    @else
                        <p class="costo">${{ number_format($item->precioVenta) }} MXN</p>
                        <input type="hidden" id="txtPrecio" value="{{ $item->precioVenta }}">
                    @endif

                    @if ($rol == true)
                        @if ($item->cantidad <= 0)
                            <h4 class="agotado">Agotado :(</h4></br>
                        @else
                            <form class="form-group mt-3" method="POST" action="/indexProducto"
                                enctype="multipart/form-data" onsubmit="return formSubmit(this);">
                                @csrf
                                <input type="hidden" name="idProducto" id="idProducto" value="{{ $item->idProducto }}" />
                                <input type="hidden" name="ruta" id="ruta" value="/detail/{{ $item->idProducto }}" />
                                <div class="form-group">
                                    <label for="cantidad">Cantidad: </label>
                                    <select name="cantidad" id="cantidad" class="form-control col-lg-10"
                                        onchange="mostrarSeleccionado();">
                                        <option value="1" selected>1</option>
                                        @for ($i = 2; $i <= $item->cantidad; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <input type="submit" onclick="alertaCompra();" value="Agregar al carrito"
                                    class="btn btn-outline-primary">
                            </form>

                            <form action="/datosDestino" method="POST">
                                {{ csrf_field() }}
                                @csrf
                                <input type="hidden" name="txtSubtotal[]" id="txtSubtotal" value="">
                                <input type="hidden" name="txtIdProducto[]" id="txtIdProducto"
                                    value="{{ $item->idProducto }}">
                                <input type="hidden" name="txtCantidad[]" id="txtCantidad" value="">
                                <input type="submit" class="button is-primary is-outlined" value="Realizar compra">
                            </form>
                        @endif
                    @endif
                    <a href="{{ URL::previous() }}">Volver</a>
                </div>
            </div>

        </div>
    </div>
</body>
@endsection

@section('style')
    <style>
        .tagDetail {
            background: #7E57C2;
            color: #EEEEEE;
            padding: 0 .8em .2em .8em;
            border-radius: 10px;
            margin: 1em 0;
            display: inline-block;
        }

        .desc {
            margin: .5em 0;
            color: #303F9F;
        }

        .costo {
            font-size: 1.7em;
            display: block;
            margin: 0;
        }

        .oferta {
            color: #f44336;
        }

        .agotado {
            display: inline-block;
            padding: .5em;
            margin-top: 1em;
            color: #f44336;
            border-radius: 10px;
        }

        .btn {
            border: 1px solid #5e72e4;
        }

        .btn:hover {
            background: #5e72e4;
            border: 1px solid #5e72e4;
        }

    </style>
@endsection

@section('script')

    <script>

        function myFunction(){

        }
        function formSubmit(form) {
            //document.getElementById("submitNew");
            setTimeout(function() {
                form.submit();
            }, 3000); // 3 seconds
            return false;
        }

        function alertaCompra() {
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'Su producto ha sido añadido correctamente',
                showConfirmButton: false,
                timer: 2500
            })
        }


        function mostrarSeleccionado() {
            var combo = document.getElementById("cantidad");
            var selected = combo.options[combo.selectedIndex].text;

            document.getElementById('txtCantidad').value = "";
            var cant = document.getElementById('txtCantidad').value = selected;

            var precio = document.getElementById("txtPrecio").value;
            var subt = (cant * precio);
            document.getElementById('txtSubtotal').value = "";
            var subtotal = document.getElementById('txtSubtotal').value = subt;
        }

    </script>

@stop
