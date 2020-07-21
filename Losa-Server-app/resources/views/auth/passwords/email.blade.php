@extends('layouts.login')
@section('content')
<h3 class="login-heading mb-4">{{ __('Reset Password') }}</h3>
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-label-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <label for="email">{{ __('E-Mail Address') }}</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2">
        {{ __('Send Password Reset Link') }}
    </button>

</form>
@endsection
