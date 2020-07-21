@extends('layouts.admin.dashboard')

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Buscar Propiedad') }}</h1>
@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
    @foreach ($errors->all() as $error)
    <strong><i class="fas fa-info-circle"></i> {{ $error }}</strong>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('info'))
<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
    <strong><i class="fas fa-info-circle"></i> {!! session('info') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between"> Propiedades 
            <form class="form-inline mt-2 mt-md-0" action="{{ route('properties.search') }}" method="GET">
                <input class="form-control mr-sm-2" type="text" placeholder="{{ __('Search') }}" name="query" id="query" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('Search') }}</button>
            </form>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p><a href="{{ route('properties.index') }}" class="btn btn-warning">Regresar</a></p>

            <h2 class="mt-3">Resultados de la busqueda:</h2>

            <p class="text-muted">{{ $results->total() }} resultado(s) para '{{ $query }}'</p>
            
            @if(count($results) > 0)

                @foreach ($results as $result)
                <div class="media text-muted pt-3">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p class="media-body ml-2 pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"> {{ $result->name }}</strong>
                    </p>
                    <a href="{{ route('properties.edit', $result) }}" class="btn btn-warning ml-4"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('properties.destroy', $result) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="deleteData()" type="submit" class="btn btn-danger ml-4"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                @endforeach
            @else
            <div class="text-center text-muted">
                <h3>Ninguna propiedad coincide con su busqueda.</h3>
            </div>
            @endif
            

        </div>
    </div>
    <div class="mt-5">
        {{ $results->appends(request()->except($query))->links() }}
    </div>
</div>
@endsection

