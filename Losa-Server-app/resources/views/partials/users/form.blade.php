@extends('layouts.admin.dashboard')
@section('content')


<div class="card mb-3">

  <div class="row no-gutters">

    <div class="col-12 col-lg-12 col-md-12">

      <div class="card-body">
        
            <form method="POST" action="{{ $route }}" >
                @csrf

                @isset($method)
                    @method($method)
                @endisset

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'name', 'label' => 'Nombre', 'model' => $user ] )
                    </div>
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'email', 'label' => 'Email', 'model' => $user ] )
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'dpi', 'label' => 'DPI', 'model' => $user ] )
                    </div>
                    <div class="col-12 col-md-6">
                        @include('partials.form-date-input', [ 'name' => 'vencimiento_dpi', 'label' => 'Vencimiento del DPI', 'model' => $user ] )
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'licencia_conducir', 'label' => 'Licencia de conducir', 'model' => $user ] )
                    </div>
                    <div class="col-12 col-md-6">
                        @include('partials.form-date-input', [ 'name' => 'vencimiento_licencia', 'label' => 'Vencimiento del Licencia de conducir', 'model' => $user ] )
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'visa', 'label' => 'Visa', 'model' => $user ] )
                    </div>
                    <div class="col-12 col-md-6">
                        @include('partials.form-date-input', [ 'name' => 'vencimiento_visa', 'label' => 'Vencimiento de Visa', 'model' => $user ] )
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'pasaporte', 'label' => 'Pasaporte', 'model' => $user ] )
                    </div>
                    <div class="col-12 col-md-6">
                        @include('partials.form-date-input', [ 'name' => 'vencimiento_pasaporte', 'label' => 'Vencimiento de Pasaporte', 'model' => $user ] )
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'seguro_vida', 'label' => 'Poliza de seguro de vida', 'model' => $user ] )
                    </div>
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'seguro_medico', 'label' => 'Poliza de seguro medico', 'model' => $user ] )
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'tipo_sangre', 'label' => 'Tipo de sangre', 'model' => $user ] )
                    </div>
                    <div class="col-12 col-md-6">
                        @include('partials.form-input', [ 'name' => 'celular', 'label' => 'Teléfono Movil', 'model' => $user ] )
                    </div>
                </div>

                {{-- TODO --}}
                {{-- Agregar validacion selected en forms al editar pasando el modelo con su propiedad --}}

                <div class="form-row">
                    <div class="col-12 col-md-6 mb-3">
                        <select class="form-control" name="contacto_losa" id="contacto_losa">
                            <option value="">¿Es un contacto general de Losa?</option>
                            <option {{ old('status', $user->contacto_losa) == 0 ? 'selected' : '' }} value="0">No es un contacto general de Losa</option>
                            <option {{ old('status', $user->contacto_losa) == 1 ? 'selected' : '' }} value="1">Si es un contacto general de Losa</option>
                        </select>
                        @error('contacto_losa')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <select class="form-control" name="status_app" id="status_app">
                            <option value="">El usuario esta activo o inactivo?</option>
                            <option {{ old('status', $user->status_app) == 1 ? 'selected' : '' }} value="1">Status Activo</option>
                            <option {{ old('status', $user->status_app) == 0 ? 'selected' : '' }} value="0">Status Inactivo</option>
                        </select>
                        @if ($errors->has('status_app'))
                            <div class="text-danger">{{ $errors->first('status') }}</div>
                        @endif
                    </div>
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