@extends('layouts.login')
@section('content').
<h3 class="login-heading mb-4">{{ __('Register') }}</h3>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-label-group">

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
        <label for="name">{{ __('Name') }}</label>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
        <label for="email">{{ __('E-Mail Address') }}</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
        <label for="password">{{ __('Password') }}</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
    </div>

    <button type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2">
        {{ __('Register') }}
    </button>

</form>
@endsection
