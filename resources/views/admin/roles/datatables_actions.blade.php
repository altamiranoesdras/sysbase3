@can('roles.show')
    <a href="{{ route('roles.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-outline-secondary btn-sm'>
        <i class="fa fa-eye"></i>
    </a>
@endcan

@can('roles.edit')
    <a href="{{ route('roles.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
        <i class="fa fa-edit"></i>
    </a>
@endcan

@can('roles.destroy')
    <a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
        <i class="fa fa-trash-alt"></i>
    </a>


    <form action="{{ route('roles.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
        @method('DELETE')
        @csrf
    </form>
@endcan
