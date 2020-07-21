@if(count($properties) > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Propiedad</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td><i class="fa fa-home" aria-hidden="true"></i> {{ $property->name }}</td>
                    <td><a href="{{ route('properties.edit', $property) }}" class="btn btn-warning ml-4"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="{{ route('properties.destroy', $property) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="confirmAction('Esta seguro que desea eliminar {{ $property->name }} ?')" type="submit" class="btn btn-danger ml-4"><i class="fas fa-trash"></i></button>
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

