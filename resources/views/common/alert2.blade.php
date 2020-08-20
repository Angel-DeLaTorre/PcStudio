@if(session('status'))
<script src="plugins/jQuery/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <script>
                $(document).ready(function () {
                    
                    var session = {!! json_encode(session('status')) !!}; 
                    alert(session);
                  
                });
        
        
</script>
@endif