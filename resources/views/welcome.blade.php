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

    </style>
</head>

<body>

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
                    <a class="nav-link" href="#">PC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Laptop</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Más
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <p style="text-align: center">Periféricos</p>
                        <a class="dropdown-item" href="#">Memorias USB</a>
                        <a class="dropdown-item" href="#">Mouse</a>
                        <a class="dropdown-item" href="#">Teclados</a>
                        <div class="dropdown-divider"></div>
                        <p style="text-align: center">Componentes</p>
                        <a class="dropdown-item" href="#">Unidades de estado sólido SSD</a>
                        <a class="dropdown-item" href="#">Discos duros HDD</a>
                        <a class="dropdown-item" href="#">Memorias RAM</a>
                        <a class="dropdown-item" href="#">Procesadores</a>
                        <a class="dropdown-item" href="#">Gabinetes</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" id="searchForm">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar en toda la tienda"
                    aria-label="Search" id="busqueda" name="busqueda">
                <button class="button is-outlined" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>
            <div class="navbar-end" style="width: 25%;">
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
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <div class="navbar-item">
                                    <a href="" class="navbar-item is-hoverable">
                                        <i class="material-icons">shopping_cart</i>
                                    </a>
                                </div>
                                <a href="{{ url('/home') }}" class="button">Dashboard</a>
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

    <!-- Contenedor principal de la página -->
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="header-body">
                @yield('module_name')
            </div>
            <div class="container">
                @yield('content')
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
                    <img src="{{ url('img/slider1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('img/slider2.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('img/slider3.png') }}" class="d-block w-100" alt="...">
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
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box">
                            <a href="">
                                <img src="{{ url('img/slider1.png') }}" class="model">
                                <hr>
                                <div class="details">
                                    <p class="title is-3 is-spaced">$4,999</p>
                                    <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                                        núcleos y
                                        3.6GHz de frecuencia con gráfica integrada</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box">
                            <a href="">
                                <img src="https://http2.mlstatic.com/alfombrilla-para-mouse-rgb-c7-efectos-luminosos-para-laptop-D_NQ_NP_901102-MLM40469770952_012020-F.webp"
                                    class="model">
                                <hr>
                                <div class="details">
                                    <p class="title is-3 is-spaced">$368.48</p>
                                    <p class="subtitle is-5">Alfombrilla Para Mouse Rgb C/7 Efectos Luminosos Para
                                        Laptop
                                    </p>
                                </div>
                        </div>
                        </a>
                    </li>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box">
                            <a href="">
                                <img src="https://http2.mlstatic.com/D_NQ_NP_2X_931087-MLA40194584468_122019-F.webp"
                                    class="model">
                                <hr>
                                <div class="details">
                                    <p class="title is-3 is-spaced">$926.86</p>
                                    <p class="subtitle is-5">Memoria RAM 8GB 1x8GB Adata ADDS1600W8G11-S</p>
                                </div>
                        </div>
                        </a>
                    </li>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box">
                            <a href="">
                                <img src="https://http2.mlstatic.com/D_NQ_NP_2X_839691-MLA42152911842_062020-F.webp"
                                    class="model">
                                <hr>
                                <div class="details">
                                    <p class="title is-3 is-spaced">$464</p>
                                    <p class="subtitle is-5">Disco sólido interno Adata Ultimate SU650 ASU650SS-120GT-R
                                        120GB negro</p>
                                </div>
                        </div>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <hr>

        <!-- Aqui se van a cargar los productos recomendados -->
        <div class="row">
            <h1 class="title">Recomendados para ti</h1>
        </div>
        <div class="row">
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
            <div class="box">
                <a href="">
                    <img src="{{ url('img/slider1.png') }}" class="model">
                    <hr>
                    <div class="details">
                        <p class="title is-3 is-spaced">$4,999</p>
                        <p class="subtitle is-5">Procesador gamer AMD Ryzen 3 3200G YD3200C5FHBOX de 4
                            núcleos y
                            3.6GHz de frecuencia con gráfica integrada</p>
                    </div>
                </a>
            </div>
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
<script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(124898)</script>
</html>
