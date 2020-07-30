<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PcStudio') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Argon CSS-->
    <link rel="stylesheet" href="{{ asset('css/argon.css?v=1.2.0') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('css/nucleo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        @media only screen and (min-width: 700px) {
            #menu-icon {
                display: none;
            }

            #module_text {
                margin-left: 300px;
            }
        }

    </style>
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="{{ url('img/logo_h.png') }}" class="navbar-brand-img" alt="Inicio">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <!--Uso de iconos de materialize https://materializecss.com/icons.html-->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/home') }}">
                                <i class="material-icons" style="color: #3490dc">home</i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <!--Ruta del método-->
                                <i class="material-icons"style="color: #e3342f">computer</i>
                                <span class="nav-link-text">Productos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="map.html">
                                <i class="material-icons" style="color: #f6993f">business</i>
                                <span class="nav-link-text">Empleados</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.html">
                                <i class="material-icons" style="color: #38c172">people</i>
                                <span class="nav-link-text">Clientes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/Categorias') }}">
                                <i class="material-icons" style="color: #3490dc">info</i>
                                <span class="nav-link-text">Categoria de productos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/Proveedores') }}">
                                <i class="material-icons" style="color: #e3342f">home</i>
                                <span class="nav-link-text">Proveedores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.html">
                                <i class="material-icons" style="color: #f6993f">shopping_cart</i>
                                <span class="nav-link-text">Compras</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="material-icons" id="menu-icon" style="color: white">menu</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/home') }}" class="list-group-item list-group-item-action">
                                        <h4 class="mb-0 text-sm" style="text-align:center;">Dashboard</h4>
                                    </a>

                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <h4 class="mb-0 text-sm" style="text-align:center;">Productos</h4>
                                    </a>

                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <h4 class="mb-0 text-sm" style="text-align:center;">Empleados</h4>
                                    </a>

                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <h4 class="mb-0 text-sm" style="text-align:center;">Clientes</h4>
                                    </a>

                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <h4 class="mb-0 text-sm" style="text-align:center;">Categoría de productos</h4>
                                    </a>

                                    <a href="{{ url('/Proveedores') }}" class="list-group-item list-group-item-action">
                                        <h4 class="mb-0 text-sm" style="text-align:center;">Proveedores</h4>
                                    </a>

                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <h4 class="mb-0 text-sm" style="text-align:center;">Compras</h4>
                                    </a>
                                </div>
                                <!-- View all -->
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                    class="dropdown-item text-center text-primary font-weight-bold py-3">Cerrar
                                    Sesión</a>
                            </div>
                        </li>
                </div>
                </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="href=" {{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class=" dropdown-item">
                                <i class="material-icons">exit_to_app</i>
                                <span>Cerrar Sesión</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
    </div>
    </nav>
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body" style="position: absolute; margin-top: 10px;">
                @yield('module_name')
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="py-3">
        @yield('content')
    </div>
    </div>

</body>

</html>
