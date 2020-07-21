@extends('layouts.admin.dashboard')
@section('content')
<div class="col-12 col-md-6 mx-auto">

    @include('partials.notifications')

    <div class="card">
        
        <div class="card-header"><i class="fas fa-user-plus mr-2"></i> {{ __('Register Aircraft') }}</div>

        <div class="card-body">

            <p><a href="{{ route('aircrafts.index') }}" class="btn btn-warning">{{ __('Back') }}</a></p>

            @include('partials.aircrafts.form', [
                'route'     =>      route('aircrafts.store'),
                'title'     =>      __('Create'),
            ])

        </div>
    </div>
</div>

@endsection