<!doctype html>
<html lang="en">
  <head>
    <title>Carrito</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  </head>
  <body>
  <a href="{{ url('/indexCarrito') }}" class="text-primary font-weight-bold py-3">Carrito de compras</a>
  <table class="table table-hover">
    <tr>
        <th>idProducto</th>
        <th>titulo</th>
        <th>descripcion</th>
        <th>marca</th>
        <th>precioVenta</th>
    </tr>
    @foreach ($listaProducto as $item)
        <tr>
            <td>{{$item->idProducto}}</td>
            <td>{{$item->titulo}}</td>
            <td>{{$item->descripcion}}</td>
            <td>{{$item->marca}}</td>
            <td>{{$item->precioVenta}}</td>
            <td>
                    <form class="form-group" method="POST" action="/indexProducto" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idProducto" id="idProducto" value="{{$item->idProducto}}" />
                        <input type="number" name="cantidad" id="cantidad"/>
                        <input type="submit" value="Agregar al carrito" class="btn btn-primary" />
                    </form>
            </td>
        </tr>
        
    @endforeach
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        
        @include('sweet::alert')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>