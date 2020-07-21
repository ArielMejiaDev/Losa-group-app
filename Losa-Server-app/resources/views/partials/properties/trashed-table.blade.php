@if(count($properties) > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Propiedad</th>
                    <th scope="col">{{ __('Restore') }}</th>
                    <th scope="col">{{ __('Delete Permanently') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td><i class="fa fa-home" aria-hidden="true"></i> {{ $property->name }}</td>
                    
                    <td>
                        <form action="{{ route('properties-trashed.update', $property) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea restaurar a la propiedad {{ $property->name }}')" type="submit" class="btn btn-primary ml-4"><i class="fas fa-plus"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('properties-trashed.destroy', $property) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea eliminar PERMANENTEMENTE a la propiedad {{ $property->name }}')" type="submit" class="btn btn-danger ml-4"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center text-muted">
        <h3>{{ __('No Properties Available') }}.</h3>
    </div>
@endif