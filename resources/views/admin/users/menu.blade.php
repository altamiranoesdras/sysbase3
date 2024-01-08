@extends('layouts.app')

@section('titulo_pagina',"Menu de: {$user->name}")
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
                            {!! Form::model($user, ['route' => ['users.menuStore', $user->id], 'method' => 'patch' ,'class' => 'esperar']) !!}

                                <div class="form-row">

                                    <div class="form-group col-sm-12">
                                        <div id="tree"></div>
                                    </div>


                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12 text-right">

                                        <a href="{!! route('users.index') !!}" class="btn btn-outline-secondary mr-2">
                                            <i class="fa fa-undo"></i>
                                            Cancelar
                                        </a>

                                        <button type="submit" class="btn btn-outline-success px-4 text-bold">
                                            <i class="fa fa-save mr-2"></i>
                                            Guardar
                                        </button>

                                        <input type="hidden" name="options" id="options">

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
                dataSource: "{{route('api.options.index')}}?parentes=1&no_dev=1",
                checkboxes: true
            }).on('checkboxChange', function (e, $node, record, state) {
                var checkedIds = tree.getCheckedNodes();

                $("#options").val(checkedIds);
            });

            let nodo = null;

            tree.on('dataBound', () =>  {

                @foreach($user->options as $op)

                    nodo = tree.getNodeById(@json($op->id ?? 0))

                    if(typeof nodo !== 'undefined'){
                        tree.check(nodo);
                    }
                @endforeach
            })

        })
    </script>
@endpush
