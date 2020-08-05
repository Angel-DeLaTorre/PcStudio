<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 800px;
    margin: auto;
    float: right;
    text-align: left;
    font-family: arial;
  }

  .column {
    float: left;
    /*width: 50%;*/
    padding: 0 8px 20px;
  }

  .imgProducto {
    float: left;
  }

  .price {
    color: grey;
    font-size: 22px;
  }

  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  .card button:hover {
    opacity: 0.7;
  }
</style>
  <body>
  <h2>Producto</h2>
        <div class="container">
            <div class="row">
                @foreach($users as $tag)
                
                <div class="column">
                  <h2 style="text-align:center">Product Card</h2>

                  <div class="card">
                    <div class="col-lg-12">
                      <div class="col-lg-6" style="float:left;">
                        <img clas="imgProducto" src="{{$tag->imagen}}" alt="Denim Jeans" style="width:100%">
                      </div>
                      <div class="col-lg-5" style="float:left;">
                        <h1>{{$tag->idProducto}}</h1>
                        <p class="price">{{$tag->marca}}</p>
                        <p>{{$tag->descripcion}}</p>
                        <p><button>Agregar al carrito</button></p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>