@extends('layouts.app')

@section('title_page',"Menu de: {$user->name}")
@include('partials.plugins.gijgo')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Menu del usuario: {{$user->name}}</h1>
                </div><!-- /.col -->
                <div class="col">
                    <a class="btn btn-outline-info float-right" href="{!! route('users.index') !!}">
                        <i class="fa fa-list"></i>
                        <span class="d-none d-sm-inline">Listado</span>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($user, ['route' => ['users.menuStore', $user->id], 'method' => 'patch']) !!}

                                <div class="form-row">

                                    <div class="form-group col-sm-12">
                                        <div id="tree"></div>
                                    </div>

                                    <div class="form-group col-sm-12">

                                        <input type="hidden" name="options" id="options">
                                        <button type="button" id="#btnSave" onClick="this.form.submit(); this.disabled=true;" class="btn btn-outline-success">Guardar</button>
                                        <a href="{!! route('users.index') !!}" class="btn btn-outline-secondary">Cancelar</a>
                                    </div>

                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@push('scripts')
    <script>
        $(function () {

            var tree = $('#tree').tree({
                primaryKey: 'id',
                uiLibrary: 'bootstrap4',
                dataSource: "{{route('api.options.index')}}?parentes=1",
                checkboxes: true
            }).on('checkboxChange', function (e, $node, record, state) {
                var checkedIds = tree.getCheckedNodes();

                $("#options").val(checkedIds);
            });

            tree.on('dataBound', function() {

                @foreach($user->options as $op)
                    tree.check(tree.getNodeById('{{$op->id}}'));
                @endforeach
            })

        })
    </script>
@endpush
