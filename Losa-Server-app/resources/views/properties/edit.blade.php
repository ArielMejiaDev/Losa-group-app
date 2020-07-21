@extends('layouts.admin.dashboard')

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Editar Propiedad') }}</h1>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between"> Propiedades 
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p><a href="{{ URL::previous() }}" class="btn btn-warning">Regresar</a></p>

            @include('partials.properties.form', [
                'route'     =>      route('properties.update', $property),
                'title'     =>      'Actualizar',
                'method'    =>      'PUT'
            ])

            {{-- <form id="form1" method="POST" action="{{ route('properties.update', $property) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Nombre de la propiedad</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $property->name }}">
                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $property->address }}">
                    @if ($errors->has('address'))
                        <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="address">N de Parqueos</label>
                            <input type="text" class="form-control" id="parking" name="parking"  value="{{ $property->parking }}">
                            @if ($errors->has('parking'))
                                <div class="text-danger">{{ $errors->first('parking') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="rooms">N de Cuartos</label>
                            <input type="text" class="form-control" id="rooms" name="rooms" value="{{ $property->rooms }}">
                            @if ($errors->has('rooms'))
                                <div class="text-danger">{{ $errors->first('rooms') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="beds">N de Camas</label>
                            <input type="text" class="form-control" id="beds" name="beds" value="{{ $property->beds }}">
                            @if ($errors->has('beds'))
                                <div class="text-danger">{{ $errors->first('beds') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="maintenancePerson">Nombre persona de mantenimiento.</label>
                            <input type="text" class="form-control" id="maintenancePerson" name="maintenancePerson" value="{{ $property->maintenancePerson }}">
                            @if ($errors->has('maintenancePerson'))
                                <div class="text-danger">{{ $errors->first('maintenancePerson') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="maintenancePhone">Telefono de persona de mantenimiento</label>
                            <input type="tel" class="form-control" id="maintenancePhone" name="maintenancePhone" value="{{ $property->maintenancePhone }}">
                            @if ($errors->has('maintenancePhone'))
                                <div class="text-danger">{{ $errors->first('maintenancePhone') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mapsLink">Link de google maps de la propiedad</label>
                    <input type="text" class="form-control" id="mapsLink" name="mapsLink" value="{{ $property->mapsLink }}">
                    @if ($errors->has('mapsLink'))
                        <div class="text-danger">{{ $errors->first('mapsLink') }}</div>
                    @endif
                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="wifiNetwork">Red de Wifi</label>
                            <input type="text" class="form-control" id="wifiNetwork" name="wifiNetwork" value="{{ $property->wifiNetwork }}">
                            @if ($errors->has('wifiNetwork'))
                                <div class="text-danger">{{ $errors->first('wifiNetwork') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="wifiPassword">Password del Wifi</label>
                            <input type="text" class="form-control" id="wifiPassword" name="wifiPassword" value="{{ $property->wifiPassword }}">
                            @if ($errors->has('wifiPassword'))
                                <div class="text-danger">{{ $errors->first('wifiPassword') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="mapsLink">Teléfono de información</label>
                            <input type="tel" class="form-control" id="infoPhone" name="infoPhone" value="{{ $property->infoPhone }}">
                            @if ($errors->has('infoPhone'))
                                <div class="text-danger">{{ $errors->first('infoPhone') }}</div>
                            @endif
                        </div>  
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="mapsLink">Teléfono de recepción</label>
                            <input type="tel" class="form-control" id="receptionPhone" name="receptionPhone" value="{{ $property->receptionPhone }}">
                            @if ($errors->has('receptionPhone'))
                                <div class="text-danger">{{ $errors->first('receptionPhone') }}</div>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="mapsLink">Id del Google Calendar de la propiedad correspondiente</label>
                    <input type="text" class="form-control" id="calendarId" name="calendarId" value="{{ $property->calendarId }}">
                    @if ($errors->has('calendarId'))
                        <div class="text-danger">{{ $errors->first('calendarId') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    
                    <div class="card w-100" style="width: 18rem;">
                            <img 
                                id="output"
                                src="{{ asset('storage/'.$property->imageUrlRelative) }}"  
                                class="card-img-top" 
                                alt="Property image"
                                onerror=this.onerror=null;this.src="{{ asset('assets/images/'.$property->imageUrlRelative) }}"
                            >
                        @if ($errors->has('imageUrlRelative'))
                            <div class="text-danger">{{ $errors->first('imageUrlRelative') }}</div>
                        @endif
                        <div class="card-body">

                            <div class="custom-file">
                                <input onchange="loadFile(event)" type="file" class="custom-file-input d-none" id="imageUrlRelative" name="imageUrlRelative" lang="es">
                                <label id="uploadLabel" class="btn btn-block btn-success" for="imageUrlRelative">Subir Imagen...</label>
                            </div>

                        </div>
                    </div>
                    
                </div>
                
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form> --}}

        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/image-loader.js') }}"></script>
@endpush

@endsection