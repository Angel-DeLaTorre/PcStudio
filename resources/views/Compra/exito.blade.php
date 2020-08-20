@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
    <div class="container">
        <div class="card p-5">
            @if ($idCompra != 'error')
                <h1 class="title">Su compra ha sido procesada con éxito, puede ver el estatus del envío en <a
                        href="{{ route('enviosPorUsuario', Auth::user()->id) }}"><strong style="color: #00D1B2">mis
                            compras</strong></a>.</h1>
            @else
                <h2>Ha ocurrido un error al realizar la compra</h2>
                <h4>Lamentamos lo sucedido</h4>
            @endif
        </div>
    </div>

@endsection

@section('script')

@endsection

@section('style')

@endsection
