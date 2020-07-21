@if(count($aircrafts) > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('Type') }}</th>
                    <th scope="col">{{ __('Passengers') }}</th>
                    <th scope="col">{{ __('Plates') }}</th>
                    <th scope="col">{{ __('Restore') }}</th>
                    <th scope="col">{{ __('Delete Permanently') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($aircrafts as $aircraft)
                <tr>
                    <td> {{ $aircraft->name  }} </td>
                    <td> {{ $aircraft->passengers }} </td>
                    <td> {{ $aircraft->plates }} </td>
                    <td>
                        <form action="{{ route('aircrafts-trashed.update', $aircraft) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea restaurar al usuario {{ $aircraft->name }} ?')" type="submit" class="btn btn-primary ml-4"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('aircrafts-trashed.destroy', $aircraft) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea eliminar PERMANENTEMENTE {{ $aircraft->name }} ?')" type="submit" class="btn btn-danger ml-4"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center text-muted">
        <h3> {{ __('No Airplanes Available') }}.</h3>
    </div>
@endif