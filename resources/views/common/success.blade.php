@if(session('status'))
<div class="alert alert-success" role="alert">
    <strong>Aviso</strong> {{ session('status')}}
    <button type="button" class="closer" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif