<form method="GET" action="{{ route('properties.searchByDates') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    @csrf
    <div class="input-group">
        <input name="date" type="date" class="form-control bg-light border-0 small" placeholder="{{ __('Searching') }}..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>