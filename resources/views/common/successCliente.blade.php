@if(session('status'))
<script src="plugins/jQuery/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hola {{auth()->user()->name}}</strong> {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif