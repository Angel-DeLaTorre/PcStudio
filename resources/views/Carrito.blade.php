<!doctype html>
<html lang="en">
  <head>
    <title>Carrito</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
    $subtotal = 0;
    $total = 0.0;
  ?>
      <table class="table tab-content">
          <tr>
              <th>Nombre del producto</th>
              <th>Descripcion</th>
              <th>Marca</th>
              <th>precioVenta</th>
              <th>Cantidad deseada</th>
              <th>subtotal</th>
          </tr>
          @foreach ($listaProductoCarrito as $item)
          <tr>
            <td>{{$item->titulo}}</td>
              <td>{{$item->descripcion}}</td>
              <td>{{$item->marca}}</td>
              <td>${{$item->precioVenta}}</td>
              <td>{{$item->cantidadProducto}}</td>
              <td>${{$subtotal = ($item->precioVenta * $item->cantidadProducto)}}</td>
              <input type="hidden" value="{{$total += $subtotal}}" />
              <td>
              <a href="{{ route('deleteProducto', $item->idCarrito) }}"><i class="material-icons"
                                        style="color: #e3342f; margin-left: 15px;">Quitar de carrito</i></a>
              </td>
          </tr>
          @endforeach
      </table>      
      <h1>Total = ${{$total}}</h1>  
  <a href="{{ url('/indexProducto') }}" class="btn btn-primary">Volver a la vista</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>