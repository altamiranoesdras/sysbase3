@can('Ver usuarios')
    <a href="{{ route('users.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-outline-secondary btn-sm'>
        <i class="fa fa-eye"></i>
    </a>
@endcan

@can('Editar usuarios')
    <a href="{{ route('users.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
        <i class="fa fa-edit"></i>
    </a>
@endcan


@can('Editar menu usuarios')
    <a href="{{ route('user.menu', $id) }}" data-toggle="tooltip" title="Menu" class='btn btn-outline-secondary btn-sm'>
        <i class="fa fa-list"></i>
    </a>
@endcan

@can('Eliminar usuarios')
    <a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
        <i class="fa fa-trash-alt"></i>
    </a>


    <form action="{{ route('users.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
        @method('DELETE')
        @csrf
    </form>
@endcan
