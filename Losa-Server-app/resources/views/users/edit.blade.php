@extends('layouts.admin.dashboard')
@section('content')
<div class="col-md-12">

    @include('partials.notifications')

    <div class="card">
        
        <div class="card-header d-flex justify-content-between"> Crear Usuario</div>

        <div class="card-body">

            <p><a href="{{ route('users.index') }}" class="btn btn-warning">Regresar</a></p>

            @include('partials.users.form', [
                'route'     =>      route('users.update', $user),
                'title'     =>      'Editar',
                'method'    =>      'PUT'
            ])

        </div>
    </div>
</div>

@endsection