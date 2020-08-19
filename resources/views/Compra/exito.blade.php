@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
<div class="container">
    <div class="card p-5">
        @if ($idCompra != 'error')
            <h2>Su compra a sido procesada con exito con el numero de compra #{{$idCompra}}</h2>            
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