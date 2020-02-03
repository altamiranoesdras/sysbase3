@can('options.create')
<a href="{{ route('option.create', $id) }}" data-toggle="tooltip" title="Nueva" class='btn btn-outline-success btn-xs'>
    <i class="fa fa-plus"></i>
</a>
@endcan


@can('options.edit')
<a href="{{ route('options.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-xs'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('options.destroy')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-xs'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('options.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan
