
@can('configurations.show')
<a href="{{ route('configurations.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-outline-secondary btn-sm'>
    <i class="fa fa-eye"></i>
</a>
@endcan

@can('configurations.edit')
<a href="{{ route('configurations.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('configurations.destroy')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('configurations.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan
