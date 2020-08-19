@if(session('status'))
<script src="plugins/jQuery/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hola {{auth()->user()->name}}</strong> {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <script>
                $(document).ready(function () {
                    
                   // alert('hola');
                    //$('#exampleModal').modal('show'); 
                    /*var session = {!! json_encode(session('status')) !!}; 
                    console.log(session);*/
                  /* if({!!session('status')!!}){
                        alert('hola');
                    }else{
                        alert('chale');
                    }*/
                    //alert('hola');
                    /*$('#material').on("click", function () {
                                 //document.location.href = "@Url.Content("~/Material/Index")";
                        });*/
                    //$('#myModal').modal('show');
                  /*  if (@ViewBag.Respuesta == 1){
        
                        $('#material').on("click", function () {
                                 document.location.href = "@Url.Content("~/Material/Index")";
                        });
                        $('#myModal').modal(function () { });
                    }
                    else if (@ViewBag.Respuesta == 2) {
        
                        alert('Tu material no se a guardado correctamente');
                    }
                    else {
                        alert('Ocurrio un error');
                    }*/
                });
        
        
</script>
@endif