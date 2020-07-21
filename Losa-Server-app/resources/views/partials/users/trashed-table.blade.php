@if(count($users) > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Phone') }}</th>
                    <th scope="col">{{ __('Restore') }}</th>
                    <th scope="col">{{ __('Delete Permanently') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> {{ $user->name  }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->phone }} </td>

                    <td>
                        <form action="{{ route('users-trashed.update', $user) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea restaurar al usuario {{ $user->name }} ?')" type="submit" class="btn btn-primary ml-4"><i class="fas fa-user-check"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('users-trashed.destroy', $user) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea eliminar PERMANENTEMENTE {{ $user->name }} ?')" type="submit" class="btn btn-danger ml-4"><i class="fas fa-user-minus"></i></button>
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