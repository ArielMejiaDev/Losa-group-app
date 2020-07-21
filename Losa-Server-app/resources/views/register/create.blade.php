@extends('layouts.admin.dashboard')
@section('content')
<div class="col-12">
    @include('partials.notifications')
</div>
<div class="col-12 col-md-6 mx-auto">

    <div class="card">
        
        <div class="card-header"><i class="fas fa-user-plus mr-2"></i>{{ __('Register User') }}</div>

        <div class="card-body">

            @include('partials.users.register-form', ['route' => route('register.store', $user), 'label' => __('Register User')])

        </div>
    </div>
</div>

@endsection