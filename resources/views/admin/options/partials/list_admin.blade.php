@foreach($opciones ?? App\Models\Option::padres()->get() as $option)
    <li  id="{{$option->id}}" class="list-group-item  border-top-0 border-bottom-0 border-right-0 py-1 {{$option->isChildren() ? '' : 'border-left-0'}}">

            <i class="fa {{$option->icono_l}}"></i>
            {{$option->nombre}}

            &nbsp;

            @include('admin.options.datatables_actions',['id' => $option->id])


        @if($option->hasChildren())
            <ul class="list-group sortable">
                @include('admin.options.partials.list_admin',['opciones' => $option->children])
            </ul>
        @endif
    </li>
@endforeach
