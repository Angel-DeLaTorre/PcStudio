@if(session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
            <script>
                $(document).ready(function () {
                    
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