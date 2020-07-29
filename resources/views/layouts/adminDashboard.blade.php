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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Argon CSS-->
    <link rel="stylesheet" href="{{ asset('css/argon.css?v=1.2.0') }}">
</head>

<body>
    <div id="app">
        <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white"
            id="sidenav-main">
            <div class="scrollbar-inner">
                <!-- Brand -->
                <div class="sidenav-header  align-items-center">
                    <a class="navbar-brand" href="javascript:void(0)">
                        <img src="{{ url('img/logo_h.png') }}" class="navbar-brand-img" alt="Inicio">
                    </a>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="dashboard.html">
                                    <i class="ni ni-tv-2 text-primary"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <!--Ruta del método-->
                                    <i class="ni ni-planet text-orange"></i>
                                    <span class="nav-link-text">Productos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="map.html">
                                    <i class="ni ni-pin-3 text-primary"></i>
                                    <span class="nav-link-text">Empleados</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.html">
                                    <i class="ni ni-single-02 text-yellow"></i>
                                    <span class="nav-link-text">Clientes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tables.html">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Categoria de productos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">
                                    <i class="ni ni-key-25 text-info"></i>
                                    <span class="nav-link-text">Proveedores</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.html">
                                    <i class="ni ni-circle-08 text-pink"></i>
                                    <span class="nav-link-text">Compras</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main class="main-content">
            <!--Navbar superior-->
            <nav class="navbar navbar-expand-md navbar-light bg-blue shadow-sm">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if(Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: whitesmoke">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="py-4">@yield('content')</div>
        </main>
    </div>
</body>

</html>
