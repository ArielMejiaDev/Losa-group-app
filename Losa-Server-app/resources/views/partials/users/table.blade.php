@if(count($users) > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    {{-- TODO --}}
                    {{-- CREAR DIRECTIVA BLADE ASOCIADO A MIDDLEWARE Y A MODELO PARA QUE SOLO EL USUARIO DE TIPO ADMIN PUEDA VER ESTO --}}
                    @admin 
                    <th scope="col">Cambiar Password</th>
                    @endadmin
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> {{ $user->name  }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->phone }} </td>
                    {{-- TODO --}}
                    {{-- CREAR DIRECTIVA BLADE ASOCIADO A MIDDLEWARE Y A MODELO PARA QUE SOLO EL USUARIO DE TIPO ADMIN PUEDA VER ESTO --}}
                    @admin 
                    <td><a href="{{ route('register.edit', $user) }}" class="btn btn-info ml-4"><i class="fas fa-edit"></i></a></td>
                    @endadmin
                    <td><a href="{{ route('users.edit', $user) }}" class="btn btn-warning ml-4"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea eliminar?')" type="submit" class="btn btn-danger ml-4"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center text-muted">
        <h3>{{ __('No Users Available') }}.</h3>
    </div>
@endif