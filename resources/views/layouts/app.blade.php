 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PcStudio - Compra PC y Aceesorios Online</title>

    <!--Imagenes: 
    https://www.pexels.com/
    -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/argon.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/argon.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Iconos de materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- JS -->

    <script>
        $(document).ready(function() {

            // Check for click events on the navbar burger icon
            $(".navbar-burger").click(function() {

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

            });
        });

        $(document).ready(function() {
            $('#autoWidth').lightSlider({
                autoWidth: true,
                loop: true,
                onSliderLoad: function() {
                    $('#autoWidth').removeClass('cS-hidden');
                }
            });
        });

    </script>


    @yield('script')

    <style>
        #searchForm {
            display: flex;
            flex-direction: row;
            padding: 2px;
            width: 100%
        }

        #busqueda {
            flex-grow: 2;
        }

        html {
            position: relative;
            min-height: 100%;

        }

        body {
            margin: 0 0 250px;
        }

        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 250px;
            width: 100%;
            overflow: hidden;
        }

        a {
            text-decoration: none !important;
        }

    </style>

    @yield('style')
    
 </head>

 <body>
     <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="{{ url('img/logo_h.png') }}" alt="" width="180">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/19">PC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/20">Laptop</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Más
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <p style="text-align: center">Hardware interno</p>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/1">Placa madre</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/2">Procesador</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/3">Memoria interna RAM</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/5">Tarjeta de video</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/6">Tarjeta de sonido</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/7">Disco Duro</a>
                            <div class="dropdown-divider"></div>
                            <p style="text-align: center">Periféricos </p>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/8">Teclados</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/9">Punteros o ratones</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/10">Micrófonos</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/11">Cámaras</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/12">Escáneres</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/13">Joysticks</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/14">Monitores</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/15">Impresoras</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/16">Bocinas</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/17">Videobeams y proyectores</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/18">Copiadoras de CD o DVD</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline col-lg-6 col-md-3 my-2 my-lg-0" id="searchForm" action="{{ route('buscarEnTienda') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar en toda la tienda"
                    aria-label="Search" id="busqueda" name="busqueda">
                <button class="button is-outlined" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>
                <div class="navbar-end col-lg-3 col-md-2">
                    @if (Route::has('login'))
                        <div class=" navbar-item">
                            <div class="buttons">
                                @auth
                                    <!-- Aqui tenemos que validar si el usuario es cliente o empleado -->
                                    <!-- Esto para mandarlo a esta misma vista o mandarlo al dashboard -->
                                    <div class="navbar-item has-dropdown is-hoverable">
                                        <a class="navbar-link">
                                            <i class="material-icons">person_outline</i>
                                        </a>
                                        <div class="navbar-dropdown">
                                            <a href="{{ route('logout') }}" class="navbar-item"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar
                                                Sesión</a>
                                                <a href="/cliente" class="navbar-item">Mis Datos</a>
                                                <a href="{{ route('enviosPorUsuario', Auth::user()->id) }}" class="navbar-item">Mis
                                                    pedidos</a>                                           
                                        </div>                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="navbar-item">
                                        <a href="/Carrito" class="navbar-item is-hoverable">
                                            <i class="material-icons">shopping_cart</i>
                                        </a>
                                    </div>
                                    <div class="navbar-item" data-toggle="tooltip" data-placement="top" title="Dashboard">
                                        <a href="{{ url('/home') }}" class="navbar-item is-hoverable">
                                            <i class="material-icons">dashboard</i>
                                        </a>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="button is-outlined">Iniciar Sesión</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="button is-info is-outlined">
                                            <strong>Registrarse</strong>
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
         
         <main class="py-4">
            @yield('content')
         </main>
     </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/lightslider.js') }}" defer></script>
</body>
<script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(124898)</script>
 </html>