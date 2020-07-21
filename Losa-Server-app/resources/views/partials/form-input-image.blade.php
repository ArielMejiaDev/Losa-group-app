<input onchange="loadFile(event)" type="file" class="custom-file-input d-none" id="{{ $name }}" name="{{ $name }}" lang="es">
@if ($errors->has($name))
<div class="text-danger">{{ $errors->first($name) }}</div>
@endif