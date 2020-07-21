<form action="{{ $route }}" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input class="form-control" type="text" id="name" name="name" value="{{ @old('name', $user->name) }}" autofocus {{ $user->email !== null ? 'readonly' : "" }}>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input class="form-control" type="email" id="email" name="email" value="{{ @old('email', $user->email) }}" autofocus {{ $user->email !== null ? 'readonly' : "" }}>
        @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input class="form-control" type="password" id="password" name="password" >
        @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="password-confirmation">{{ __('Confirm Password') }}</label>
        <input class="form-control" type="password" class="form-control" id="password-confirmation" name="password_confirmation" >
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-large btn-block">{{ $label }}</button>
    </div>

</form>