@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">


        {{ $saludo }}
        <span style="color:#83e8f5 ">
            <b>
                {{ $nombreSaludo }}
            </b>
        </span>
    </h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">MÁS VENDIDO ESTE MES</h5>
                            <h4><span class="font-weight-bold mb-0 mt-0">{{ $productosMasVendidos[0] }}</span></h4>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white
                                                rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-0 mb-0 text-sm">
                    <h5 class="card-title text-uppercase text-muted mb-1">MÁS VENDIDO DEL MES ANTERIOR</h5>
                    <b>
                        <h4>
                            <span class="font-weight-bold text-info mb-0 mt-0">
                                {{ $productosMasVendidos[1] }}
                            </span>
                        </h4>
                    </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-2">CLIENTES NUEVOS ESTE MES</h5>

                            <span class="h2 font-weight-bold mb-0">
                                {{ $cantidadUsuarios[0] }}
                            </span>
                            <span class="h6 text-uppercase mb-0">USUARIOS REGISTRADOS</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange
                                                text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    <h5 class="card-title text-uppercase text-muted mb-2">

                        CLIENTES NUEVOS DEL MES ANTERIOR
                    </h5>
                    <b>
                        <span class="text-warning mr-2"><i class="fa fa-arrow-up"></i>
                            {{ $cantidadUsuarios[1] }}
                        </span>
                        <span class="h6 text-uppercase mb-0">USUARIOS REGISTRADOS</span>
                    </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-2">VENTAS DURANTE ESTE MES</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $cantidadVentas[0] }} </span>
                            <span class="h6 text-uppercase mb-0">PRODUCTOS VENDIDOS</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white
                                                rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    <h5 class="card-title text-uppercase text-muted mb-2">VENTAS DURANTE EL MES ANTERIOR</h5>
                    <b>
                        <span class="text-success mr-3"><i class="fa fa-arrow-up"></i>
                            {{ $cantidadVentas[1] }}
                        </span>
                        <span class="h6 text-uppercase mb-0">PRODUCTOS VENDIDOS</span>
                    </b>

                    </p>
                </div>
            </div>
        </div>
    </div>




    </div>
    </div>
    </div>
@endsection
