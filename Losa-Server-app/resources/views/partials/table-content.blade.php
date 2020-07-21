<div class="col-md-12">

    <div class="card">

        <div class="card-header d-flex justify-content-between">

            @include('partials.table-header', $header )

        </div>

        <div class="card-body">

            @isset ($createButtonRoute)
                @include('partials.create-new-button', [ 'route' =>  $createButtonRoute] )
            @endisset
            
            @include($table)

        </div>
        
    </div>

    @include('partials.paginator', [ 'links' => $footer ] )

</div>

@push('scripts')
    <script src="{{ asset('js/confirm-action.js') }}"></script>
@endpush