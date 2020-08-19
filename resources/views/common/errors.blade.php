@if ($errors->any())
<div class="alert alert-success alert-danger fade show" role="alert">
    <strong>Hola {{auth()->user()->name}}</strong> 
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
   </ul>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
@endif

   