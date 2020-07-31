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

    <!-- Styles -->
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-0.9.0/css/bulma.min.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

    </script>

    <style>
        #searchbar {
            border-color: #fff;
            -webkit-box-shadow: 5px 5px 20px 1px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 5px 5px 20px 1px rgba(0, 0, 0, 0.2);
            box-shadow: 5px 5px 20px 1px rgba(0, 0, 0, 0.2);
            margin-top: 15px;
        }

        #btnsearch {
            margin-top: 15px;
            border-color: #fff;
            width: 20px;
            right: 45px;
        }

        #searchbarcontainer {
            margin-left: auto;
            margin-right: auto;
            -webkit-box-shadow: 5px 5px 20px 1px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 5px 5px 20px 1px rgba(0, 0, 0, 0.2);
            box-shadow: 5px 5px 20px 1px rgba(0, 0, 0, 0.2);
            width: 70%;
            border-radius: 8px;
            margin-top: 1%;
            margin-bottom: 1%;
        }

        form {
            display: flex;
            flex-direction: row;
            padding: 2px;
            width: 100%
        }

        input {
            flex-grow: 2;
            border-color: #fff;
        }

        input:focus {
            /* removing the input focus blue box. Put this on the form if you like. */
            outline: none;
        }

        #logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin: 0 0 250px;
            /* bottom = footer height */
        }

        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 250px;
            width: 100%;
            overflow: hidden;
        }

    </style>
</head>

<body>

    <!-- Barra de navegación principal-->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <!-- Contenedor del logo -->
        <div class="navbar-brand" style="width: 25%;">
            <a class="navbar-item" href="/">
                <img src="{{ url('img/logo_h.png') }}" alt="PcStudio" id="logo">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="" style="width: 50%;">
            <form>
                <input class="input" name="searchbar" id="searchbar" placeholder="Buscar en toda la tienda" />
                <button class="button" id="btnsearch"><i class="material-icons">search</i></button>
            </form>
        </div>
        <!-- Botones de login y carrito -->
        <div class="navbar-end" style="width: 25%;">
            @if(Route::has('login'))
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                            <a href="{{ route('login') }}" class="button is-light">Iniciar Sesión</a>
                            @if(Route::has('register'))
                                <a href="{{ route('register') }}" class="button is-primary">
                                    <strong>Registrarse</strong>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif
        </div>
    </nav> <!-- Fin navbar principal -->

    <!-- Contenedor con las categorías -->
    <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
        <div class="columns">
            <div class="column" style="color: black">
                <h4 class="title is-5" style="text-align: center">Computadoras de escritorio</h4>
            </div>
            <div class="column" style="color: black">
                <h4 class="title is-5" style="text-align: center">Laptops</h4>
            </div>
            <div class="column" style="color: black">
                <h4 class="title is-5" style="text-align: center">Componentes</h4>
            </div>
            <div class="column" style="color: black">
                <h4 class="title is-5" style="text-align: center">Periféricos</h4>
            </div>
        </div>
    </div> <!-- Fin container categorias -->

    <!-- Contenedor principal de la página -->
    <section class="hero is-primary">
        <div class="hero-body">
            <p class="title is-1">
                Aqui va el contenido de la página del cliente
            </p>
            <p class="subtitle is-1">
                Como lo son productos en general y algunas recomendaciones.
            </p>
            <p class="subtitle is-3">
                Podemos mandar a llamar muchas vistas con el método yield y ponerlas aqui, desde el mismo controlador.
            </p>
        </div>
    </section> <!-- Fin contenedor principal de la página -->

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
</body>

</html>
