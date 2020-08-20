@if(session('status'))
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <script>
                $(document).ready(function () {
                    
                    var session = {!! json_encode(session('status')) !!}; 
                    swal({
                    title: "Accion Realizada",
                    text: session,
                    icon: "success",
                    });
                                    
                 });
                
        
        
</script>
@endif