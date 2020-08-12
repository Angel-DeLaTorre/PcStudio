@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
    <div>
        <div id="paypal-button-container"></div>
        <input type="number" id="costo" value="50">
        <?php 
            if(isset($_GET['reason'])){
                echo $_GET['reason'];
            }
        ?>
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