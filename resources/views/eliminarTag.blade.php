@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">Eliminar Tag {{ $tag->idTag }}</h1>
@endsection
@section('content')

    <form action="{{ route('delete', $tag) }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="card">
            <div class="card-body">

                <div class="form-group">

                    <label for="nombre">¿Quieres eliminar la tag {{ $tag->tag }}?</label>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                    <a href="{{ url('/listaTag') }}" class="text-primary font-weight-bold py-3">Regresar a la lista</a>
                </div>
            </div>
        </div>
    </form>

@endsection

  <form action="{{ route('delete', $tag)}}" method="POST">
  @csrf @method('DELETE')
  {{ csrf_field()}}
  <div class="container">
      
    <button type="submit" class="dangerbtn">Eliminar Tag</button>
  </div>
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>