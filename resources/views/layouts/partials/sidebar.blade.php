<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link navbar-primary">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->img}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile')}}" class="d-block">{{ Auth::user()->name }} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">


{{--                <li class="nav-header">EXAMPLES</li>--}}

                @foreach(App\Models\Option::padres()->get() as $option)
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
                                            @foreach($option->children as $index => $option)
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
                                                    @foreach($option->children as $option)
                                                        <ul class="nav nav-treeview">
                                                            <li class="nav-item">
                                                                <a href="{{rutaOpcion($option)}}" class="nav-link">
                                                                    <i class="nav-icon {{$option->icono_l}}"></i>
                                                                    <p>{{$option->nombre}}</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                </li>

                                            @endforeach
                                        </ul>
                                    @endif
                                </li>

                            @endforeach
                            </ul>
                        @endif

                    </li>
                @endforeach

{{--                <li class="nav-header">EXAMPLES</li>--}}


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
