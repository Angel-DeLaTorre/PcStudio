 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

     <!-- Styles -->
     <link href="{{ asset('css/bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
     <link href="{{ asset('css/bulma-0.9.0/css/bulma.min.css') }}" rel="stylesheet">

     <!--Argon CSS-->
     <link rel="stylesheet" href="{{ asset('css/argon.css?v=1.2.0') }}">
 </head>

 <body>
     <div id="app">
         <nav class="navbar" role="navigation" aria-label="main navigation">
             <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="{{ url('img/logo_h.png') }}" alt="PcStudio" id="logo">
                </a>

                 <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                     <span aria-hidden="true"></span>
                     <span aria-hidden="true"></span>
                     <span aria-hidden="true"></span>
                 </a>
             </div>
         </nav>

         <main class="py-4">
             @yield('content')
         </main>
     </div>
 </body>

 </html>
