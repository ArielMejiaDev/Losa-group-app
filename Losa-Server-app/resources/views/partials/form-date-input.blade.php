<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="date" class="form-control" id="{{ $name }}" name="{{ $name }}" placeholder="{{ __($label) }}" value="{{ @old($name, $model->$name) }}" autofocus>
    @if ($errors->has($name))
        <div class="text-danger">{{ $errors->first($name) }}</div>
    @endif
</div>