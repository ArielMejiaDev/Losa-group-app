@if(session('status'))
<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
    <strong><i class="fas fa-info-circle"></i> {{ session('status') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
