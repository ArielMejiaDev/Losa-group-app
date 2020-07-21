@extends('layouts.admin.dashboard')

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Eventos para el') }} {{ $date }}</h1>
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
        <div class="card-header d-flex justify-content-between"> {{ __('Eventos') }} 
        </div>

        <div class="card-body table-responsive">

            @if(count($events) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Event') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Start') }}</th>
                            <th scope="col">{{ __('End') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($events as $event)
                        <tr>
                            <th>{{ $event->summary }}</th>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->timeStart }}</td>
                            <td>{{ $event->timeEnd }}</td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            @else
            <div class="text-center text-muted">
                <h3>{{ __('No Events Available') }}.</h3>
            </div>
            @endif
            

        </div>

    </div>

    <div class="mt-5">
        {{ $events->appends(request()->except($date))->links() }}
    </div>
</div>
@endsection





