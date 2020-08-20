<!-- PÁGINA PRINCIPAL. DONDE EL CLIENTE VERÁ LOS PRODUCTOS -->
<!DOCTYPE html>
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

    <!-- Styles -->
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.min.css') }}" rel="stylesheet">
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

        .ego {
            margin: 0;
            padding: .5em 1em;
            color: #757575;
            font-family: 1.2em;
        }

        .ago {
            color: #f44336;
            font-size: 1.2em;
        }

        .del {
            color: #f44336;

        }

    </style>
</head>

<body>
    <!-- Mejora de index -->
    <!-- Barra de navegación principal-->
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
            <form class="form-inline col-lg-6 col-md-3 my-2 my-lg-0" id="searchForm">
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
    <!-- Fin navbar principal -->
    <div class="container" style="margin-top: 50px">
        <!-- Slider -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="">
                <div class="carousel-item active">
                    <a href="/detail/9"><img src="{{ url('img/slider1.png') }}" class="d-block w-100" alt="..."></a>
                </div>
                <div class="carousel-item">
                    <a href="/detail/101"><img src="{{ url('img/slider2.png') }}" class="d-block w-100" alt="..."></a>
                </div>
                <div class="carousel-item">
                    <a href="/detail/102"><img src="{{ url('img/slider3.png') }}" class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- Slider -->


        <!-- Contenedor de productos nuevos -->
        <div class="row" style="margin-top: 100px;">
            <h3 class="subtitle is-3">Nuevos productos</h3>
            <div class="cards-container">
                <ul id="autoWidth" class="cs-hidden">
                    <!-- Los li se tienen que crear de forma dinámica a través del uso de PHP -->
                    @foreach ($news as $new)
                        <li class="item-a">
                            <!--slider-box-->
                            <div class="box">
                                <a href="/detail/{{ $new->idProducto }}">
                                    <img src="{{ url('img/productos/' . $new->imagenUrl) }}" class="model">
                                    <hr>
                                    <div class="details">
                                        <div class="row ml-2">
                                            @if ($new->descuentoVenta > 0)
                                                <p class="title is-4 is-spaced">
                                                    ${{ number_format($new->precioVenta - ($new->descuentoVenta * $new->precioVenta) / 100, 2) }}
                                                </p>
                                                <del class="ml-2 del">
                                                    <p class="del">${{ number_format($new->precioVenta, 2) }}</p>
                                                </del>
                                            @else
                                                <p class="title is-4 is-spaced">
                                                    ${{ number_format($new->precioVenta, 2) }}</p>
                                            @endif

                                        </div>
                                        <p class="subtitle is-5">{{ $new->titulo }}</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

        <hr>

        <!-- Aqui se van a cargar los productos recomendados -->
        <div class="row">
            <h1 class="title">Recomendados para ti</h1>
        </div>
        <div class="row">
            @foreach ($productos as $producto)
                <div class="box">
                    <a href="/detail/{{ $producto->idProducto }}">
                        <img src="{{ url('img/productos/' . $producto->imagenUrl) }}" class="model">
                        <hr>
                        <div class="details">
                            <div class="row ml-2">
                                @if ($producto->descuentoVenta > 0)
                                    <p class="title is-4 is-spaced">
                                        ${{ number_format($producto->precioVenta - ($producto->descuentoVenta * $producto->precioVenta) / 100, 2) }}
                                    </p>
                                    <del class="ml-2 del">
                                        <p class="del">${{ number_format($producto->precioVenta, 2) }}</p>
                                    </del>
                                @else
                                    <p class="title is-4 is-spaced">${{ number_format($producto->precioVenta, 2) }}</p>
                                @endif

                            </div>

                            @if ($producto->cantidad == 0)
                                <p class="ago">Agotado</p>
                            @endif
                            <p class="subtitle is-5">{{ $producto->titulo }}</p>
                            <p class="ego">{{ $producto->marca }}</p>
                            <p class="tag">#{{ $producto->tag }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>


    </div>
    <!-- Inicio Footer-->
    <footer class="footer">
        <div class="content has-text-centered">
            <img src="{{ url('img/logo_vertical S.png') }}" class="navbar-brand-img" alt="Inicio" style="width: 50px">
            <p style="margin-top: 5px">
                <strong>PcStudio</strong> de PixeLab. Código fuente bajo licencia de
                <a href="https://opensource.org/licenses/GPL-3.0">GPL-3.0</a>.
                <br>
                Contacto <a href="mailto: pcstudio987@gmail.com">pcstudio987@gmail.com</a>
            </p>
        </div>
    </footer>
    <!-- Fin Footer-->

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
<script src="https://account.snatchbot.me/script.js"></script>
<script>
    window.sntchChat.Init(124898)

</script>

</html>
