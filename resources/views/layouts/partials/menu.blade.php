@foreach($opciones ?? App\Models\Option::padres()->get() as $option)
    <li class="nav-item {{$option->hasTreeview()}} {{$option->openTreeView()}}">
        <a href="{{rutaOpcion($option)}}" class="nav-link {{$option->active()}}">
            <i class="nav-icon fa {{$option->icono_l}}"></i>
            <p>
                {{$option->nombre}}
                @if($option->hasChildren())
                    <i class="right fa fa-angle-left"></i>
                @endif
            </p>
        </a>
        @if($option->hasChildren())
            <ul class="nav nav-treeview">
                @foreach($option->children as $index => $option)

                    <li class="nav-item {{$option->hasTreeview()}} {{$option->openTreeView()}}">
                        <a href="{{rutaOpcion($option)}}" class="nav-link {{$option->active()}}">
                            <i class="nav-icon fa {{$option->icono_l}}"></i>
                            <p>
                                {{$option->nombre}}
                                @if($option->hasChildren())
                                    <i class="right fa fa-angle-left"></i>
                                @elseif($option->icono_r)
                                    <span class="right badge badge-danger">New</span>
                                @endif
                            </p>
                        </a>
                        @if($option->hasChildren())
                            <ul class="nav nav-treeview">
                                @include('layouts.partials.menu',['opciones' => $option->children])
                            </ul>
                        @endif
                    </li>

                @endforeach
            </ul>
        @endif

    </li>
@endforeach
