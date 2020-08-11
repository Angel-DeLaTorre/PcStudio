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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <!-- Styles -->
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.min.css') }}" rel="stylesheet">

    <!--Argon CSS-->
    <link rel="stylesheet" href="{{ asset('css/argon.css?v=1.2.0') }}">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin: 0 0 150px;
            /* bottom = footer height */
        }
        .card-body{
            overflow-x: auto;
        }
        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 150px;
            width: 100%;
            overflow: hidden;
        }

        #mInput {
            position: relative;
            margin-left: 50px;
        }

        #s-logo {
            width: 120px;
            margin-left: 15%;
        }

        /* Sidebar Styles */

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 250px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #000;
        }

        @media(min-width: 800px) {
            #wrapper {
                padding-left: 0;
            }

            #wrapper.toggled {
                padding-left: 250px;
            }

            #wrapper.toggled #sidebar-wrapper {
                width: 250px;
            }

            #page-content-wrapper {
                position: relative;
            }

            #wrapper.toggled #page-content-wrapper {
                position: relative;
                margin-right: 0;
            }

            #menu-icon {
                display: none;
            }

            #module-content {
                margin-top: -5%;
            }
        }

        .card-body {
            overflow-x: auto;
        }

    </style>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Filtrar registros -->
    <script>
        $(document).ready(function() {
            $("#mInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#registros tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
</head>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="width: 0px; ">

            <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white"
                id="sidenav-main">
                <div class="scrollbar-inner">
                    <!-- Brand -->
                    <div class="sidenav-header  align-items-center">
                        <a class="navbar-brand" href="/">
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
                                        <i class="material-icons" style="color: #e3342f">computer</i>
                                        <span class="nav-link-text">Productos</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/empleado') }}">
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
                                    <a class="nav-link" href="{{ url('/listaTag') }}">
                                        <i class="material-icons" style="color: #e3342f">Tag</i>
                                        <span class="nav-link-text">Tags</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.html">
                                        <i class="material-icons" style="color: #f6993f">shopping_cart</i>
                                        <span class="nav-link-text">Compras</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/usuario') }}">
                                        <i class="material-icons" style="color: #3490dc">assignment_ind</i>
                                        <span class="nav-link-text">Usuarios</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/clienteMoral') }}">
                                        <i class="material-icons" style="color: #38c172">directions_walk</i>
                                        <span class="nav-link-text">Cliente Moral</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Navbar links -->
                        <ul class="navbar-nav align-items-center  ml-md-auto ">
                            <li class="nav-item d-xl-none">
                                <!-- Sidenav toggler -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons" id="menu-icon" style="color: white;">menu</i>
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

                                        <a href="{{ url('/empleado') }}" class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Empleados</h4>
                                        </a>

                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Clientes</h4>
                                        </a>

                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Categoría de
                                                productos</h4>
                                        </a>

                                        <a href="{{ url('/Proveedores') }}"
                                            class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Proveedores</h4>
                                        </a>

                                        <a href="{{ url('/listaTag') }}"
                                            class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Tags</h4>
                                        </a>

                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Compras</h4>
                                        </a>

                                        <a href="{{ url('/usuario') }}" class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Usuarios</h4>
                                        </a>

                                        <a href="{{ url('/clienteMoral') }}" class="list-group-item list-group-item-action">
                                            <h4 class="mb-0 text-sm" style="text-align:center;">Cliente Moral</h4>
                                        </a>
                                    </div>
                                    <!-- View all -->

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                        class="dropdown-item text-center text-primary font-weight-bold py-3">Cerrar
                                        Sesión</a>
                                </div>
                            </li>
                            </li>
                        </ul>
                        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                            <li class="nav-item dropdown">
                                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                        <i class="material-icons">person_outline</i>
                                        <div class="media-body  ml-2  d-none d-lg-block">
                                            <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right ">

                                    <a href=" {{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class=" dropdown-item">
                                        <i class="material-icons">exit_to_app</i>
                                        <span>Cerrar Sesión</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
            </nav>
            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body" style="height: 150px;">
                        @yield('module_name')
                    </div>
                </div>
            </div>
            <!-- Page content -->
            <div class="container-fluid" id="module-content" style="margin-top: -10%; position: relative;">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <footer class="footer">
        <div class="content has-text-centered">
            <img src="{{ url('img/logo_vertical S.png') }}" class="navbar-brand-img" alt="Inicio" style="width: 50px">
            <p style="margin-top: 5px">
                <strong>PcStudio</strong> de PixeLab. Código fuente licenciado por
                <a href="https://opensource.org/licenses/GPL-3.0">GPL-3.0</a>.
            </p>
        </div>
    </footer>
</body>
@yield('script')
</html>
