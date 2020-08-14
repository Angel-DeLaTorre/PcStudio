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
    <div class="container-fluid mt--6">
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
    <div class="nav-wrapper">
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                        class="ni ni-cloud-upload-96 mr-2"></i>Usuarios por TAG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2"
                    role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                        class="ni ni-bell-55 mr-2"></i>Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3"
                    role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
                        class="ni ni-calendar-grid-58 mr-2"></i>Messages</a>
            </li>
        </ul>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                    aria-labelledby="tabs-icons-text-1-tab">
                    <div class="card bg-default">
                        <div class="card-header bg-transparent">
                            <h3 class="text-white">USUARIOS</h3>
                        </div>
                        <div class="card-body">
                            <style>
                                #chartdiv {
                                    width: 100%;
                                    height: 500px;
                                }

                            </style>

                            <!-- Resources -->
                            <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                            <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                            <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                            <script src="{{ url('/js/components/charts/chart-main.js') }}"></script>
                            <!-- Chart code -->


                            <!-- HTML -->
                            <div id="chartdiv"></div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                    <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat
                        salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                </div>
                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                    <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu
                        stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                        helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                </div>
            </div>
        </div>
    </div>




@endsection
