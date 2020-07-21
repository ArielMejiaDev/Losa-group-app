@extends('layouts.admin.dashboard')
@section('content')


<div class="card mb-3">

  <div class="row no-gutters">

{{-- Image --}}
      <div class="col-12 col-lg-4 col-md-12">
        <img id="output" src="{{ $aircraft->image !== null ? asset('storage/' . $aircraft->image) : asset('images/image-placeholder.svg') }}" class="card-img" alt="{{ $aircraft->type }}" onerror="this.src='{{ $aircraft->image }}';">
        <div class="custom-file my-3 text-center">
          <label id="uploadLabel" class="btn btn-success" for="image">Subir Imagen...</label>
        </div>
        @error('image')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
{{-- End image --}}

    <div class="col-12 col-lg-8 col-md-12">

      <div class="card-body">
        
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @csrf

                @isset($method)
                    @method($method)
                @endisset

                <div class="form-row">
                    <div class="col-12 col-md-12">
                        @include('partials.form-input', [ 'name' => 'name', 'label' => __('Type'), 'model' => $aircraft ] )
                    </div>
                    <div class="col-12 col-md-12">
                        @include('partials.form-input', [ 'name' => 'passengers', 'label' => __('Passengers'), 'model' => $aircraft ] )
                    </div>
                    <div class="col-12 col-md-12">
                        @include('partials.form-input', [ 'name' => 'plates', 'label' => __('Plates'), 'model' => $aircraft ] )
                    </div>
                    <div class="col-12 col-md-12">
                        @include('partials.form-input', [ 'name' => 'calendar_id', 'label' => __('Calendar Id'), 'model' => $aircraft ] )
                    </div>
                    @include('partials.form-input-image', [ 'name' => 'image'  ] )
                    @if ($errors->any())
                        <p class="text-danger">{{ $errors->first() }}</p>
                    @endif
                </div>
                
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