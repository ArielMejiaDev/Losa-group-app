@extends('layouts.admin.dashboard')

@section('content')

@include('partials.notifications')

<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between"> 
            <h2 class="lead d-none d-sm-block">
                <i class="fas fa-sync mr-2"></i>
                {{ __('Users Sync') }}
            </h2>
        </div>
        <div class="card-body">
            <form action="{{ route('sync.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-lg btn-block">{{ __('Sync') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection