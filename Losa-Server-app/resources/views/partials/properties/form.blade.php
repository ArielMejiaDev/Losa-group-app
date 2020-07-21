@extends('layouts.admin.dashboard')
@section('content')


<div class="card mb-3">

  <div class="row no-gutters">

    <div class="col-12 col-lg-4 col-md-12">
        <img id="output" src="{{ asset('storage/' . $property->image) }}" class="card-img" alt="..." onerror="this.src='{{ asset('images/image-placeholder.svg') }}'">

        <div class="custom-file mt-3 text-center">
            <label id="uploadLabel" class="btn btn-success" for="image">Subir Imagen...</label>
        </div>

    </div>

    <div class="col-12 col-lg-8 col-md-12">

      <div class="card-body">
        
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @csrf

                @isset($method)
                    @method($method)
                @endisset

                @include('partials.form-input', [ 'name' => 'name', 'label' => 'Nombre', 'model' => $property ] )
                @include('partials.form-input', [ 'name' => 'address', 'label' => 'Dirección', 'model' => $property ] )

                <div class="form-row">
                    <div class="col-12 col-md-4">
                        @include('partials.form-input', [ 'name' => 'parking', 'label' => 'Parqueo', 'model' => $property ] )
                    </div>
                    <div class="col-12 col-md-4">
                        @include('partials.form-input', [ 'name' => 'rooms', 'label' => 'Cuartos', 'model' => $property ] )
                    </div>
                    <div class="col-12 col-md-4">
                        @include('partials.form-input', [ 'name' => 'beds', 'label' => 'Camas', 'model' => $property ] )
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'maintenance_person', 'label' => 'Persona de mantenimiento', 'model' => $property ] )
                    </div>
                    <div class="col-sm-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'maintenance_phone', 'label' => 'Teléfono persona de mantenimiento', 'model' => $property ] )
                    </div>
                </div>

                @include('partials.form-input', [ 'name' => 'maps_link', 'label' => 'Enlace de google maps', 'model' => $property ] )

                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'wifi_network', 'label' => 'Red de wifi', 'model' => $property ] )
                    </div>
                    <div class="col-sm-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'wifi_password', 'label' => 'Password de wifi', 'model' => $property ] )
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'info_phone', 'label' => 'Teléfono de información', 'model' => $property ] )
                    </div>
                    <div class="col-sm-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'reception_phone', 'label' => 'Teléfono de recepción', 'model' => $property ] )
                    </div>
                </div>

                @include('partials.form-input', [ 'name' => 'calendar_id', 'label' => 'Id del calendario de google maps', 'model' => $property ] )

                @include('partials.form-input-image', [ 'name' => 'image'  ] )
                @if ($errors->any())
                    <div class="text-danger">{{ $errors->first() }}</div>
                @endif
                
                @include('partials.submit-button', ['title' => $title])

            </form>

      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('js/image-loader.js') }}"></script>
@endpush

@endsection