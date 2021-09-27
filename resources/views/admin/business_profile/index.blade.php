@extends('layouts.app')

@section('title_page','Configuraciones')
@include('layouts.plugins.bootstrap_fileinput')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Configuraciones</h1>
                </div><!-- /.col -->
                <div class="col">
                    <a class="btn btn-outline-info float-right" href="{!! route('home') !!}">
                        <i class="fa fa-home"></i>
                        <span class="d-none d-sm-inline">Inicio</span>
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
                            <form action="{{route('profile.business.store')}}" method="post" class="wait-on-submit" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-sm-6">
                                        <div class="form-group col-sm-12">
                                            {!! Form::label('name', 'Logo:') !!}
                                            <input type="file" name="logo" class="form-control" id="logo">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="form-group col-sm-12">
                                            {!! Form::label('nombre_negocio', 'Nombre Empresa:') !!}
                                            {!! Form::text('name', config('app.name'), ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group col-sm-12">
                                            {!! Form::label('telefono_negocio', 'Teléfono Empresa:') !!}
                                            {!! Form::text('telefono_negocio', config('app.telefono_negocio'), ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group col-sm-12">
                                            {!! Form::label('direccion_negocio', 'Dirección Empresa:') !!}
                                            {!! Form::text('direccion_negocio', config('app.direccion_negocio'), ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group col-sm-12">
                                            {!! Form::label('correo_negocio', 'Correo Empresa:') !!}
                                            {!! Form::text('correo_negocio', config('app.correo_negocio'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 mt-3">
                                        <a href="{!! route('profile.business') !!}" class="btn btn-outline-secondary ml-2">Cancelar</a>
                                        <button type="submit"  class="btn btn-outline-success ml-3">Guardar</button>
                                    </div>

                                </div>

                            </form>

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


        var initialPreviewProyecto = false;
        @if (getLogo())
            initialPreviewProyecto = "{{asset(getLogo())}}";
        @endif

        $("#logo").fileinput({
            language: "es",
            initialPreview: initialPreviewProyecto,
            dropZoneEnabled: true,
            maxFileCount: 1,
            maxFileSize: 2000,
            allowedFileExtensions: ["jpg"],
            showUpload: false,
            initialPreviewAsData: true,
            initialPreviewFileType: 'pdf',
            showBrowse: true,
            showRemove: true,
            theme: "fa",
        });
    })
</script>
@endpush
