<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <title>SweetAlert en Laravel 5.5 | Rimorsoft Online</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">SweetAlert en Laravel 5.5</h1>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script> 
            swal({
                "timer":1800,
                "title":"Título",
                "text":"Notificación Básica",
                "showConfirmButton":true
            });
        </script>
        @include('sweet::alert')
    </body>
</html>