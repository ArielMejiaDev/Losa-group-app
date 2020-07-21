@extends('layouts.login')
@section('content')
@if (session('resent'))
    <div class="alert alert-primary mb-5" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif
<h3 class="login-heading mb-4">{{ __('Verify Your Email Address') }}</h3>
{{ __('Before proceeding, please check your email for a verification link.') }}
{{ __('If you did not receive the email') }}, 
<a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 mt-3" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
</div>
@endsection
