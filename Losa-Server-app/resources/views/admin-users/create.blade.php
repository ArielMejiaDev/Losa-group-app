@extends('layouts.admin.dashboard')
@section('content')
<div class="col-12">
    @include('partials.notifications')
</div>
<div class="col-12 col-md-6 mx-auto">

    <div class="card">
        
        <div class="card-header"><i class="fas fa-user-plus mr-2"></i>{{ __('Invite Admin') }}</div>

        <div class="card-body">

            <form action="{{ route('invite-admin.store') }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('User') }}</label>
                    <input type="email" class="form-control" name="email" id="email" list="users" autofocus>
                    <datalist id="users">
                        @foreach ($users as $user)
                            <option value="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </datalist>
                </div>
                <button class="btn btn-primary btn-block" type="submit">{{ __('Sent') }}</button>
            </form>

        </div>
    </div>
</div>

@endsection