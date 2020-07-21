@extends('layouts.admin.dashboard')
@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Crear Propiedad') }}</h1>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between"> Crear Propiedad
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p><a href="{{ route('properties.index') }}" class="btn btn-warning">Regresar</a></p>

            @include('partials.properties.form', [
                'route'     =>      route('properties.store'),
                'title'     =>      'Crear',
            ])

        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/image-loader.js') }}"></script>
@endpush

@endsection