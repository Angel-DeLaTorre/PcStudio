@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
    <div class="mx-5">
        <div class="col-lg-12">
            <?php 
                if(isset($_GET['reason'])){
                    echo $_GET['reason'];
                }else {
                    
                    echo 'hola';
                }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h2>Detalles del pedido </h2>
                <div >
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <h2 class="mb-5">Realizar pago</h2>
                <div class="col-lg-10 col-md-12 col-sm-7">
                    <div id="paypal-button-container"></div>
                </div>
                <input type="number" hidden id="costo" value="1">
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
    <style></style>
@endsection