@if(session('status'))
<script src="plugins/jQuery/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div>
    <div class=" modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h5 class="modal-title text-white" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseas borrar el registro ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-danger" id="save">Eliminar</button>
            </div>
        </div>
        </div>
    </div>
</div>

            <script>
                $(document).ready(function () {
                    
                    alert('hola');
                    $('#exampleModal').modal('show'); 
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