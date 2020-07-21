<form method="POST" action="{{ route('login') }}" onsubmit="loading()">
    @csrf
    <h3 class="login-heading mb-4">{{ __('Login') }}</h3>

    <div class="form-label-group">
        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <label for="email">{{ __('Email Address') }}</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
        <label for="password">{{ __('Password') }}</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="custom-control custom-checkbox mb-3">
        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="custom-control-label" for="remember">{{ __('Remember Password') }}</label>
    </div>

    <button type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <div class="text-center">
            <a class="" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
    @endif

</form>


@push('scripts')
    <script src="{{ asset('js/loginSpinner.js') }}"></script>
@endpush