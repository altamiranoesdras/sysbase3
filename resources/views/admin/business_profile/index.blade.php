@extends('layouts.app')

@section('titulo_pagina','Configuraciones')
@include('layouts.plugins.bootstrap_fileinput')
@include('layouts.plugins.select2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Configuraciones</h1>
                </div><!-- /.col -->
                <div class="col">
                    <a class="btn btn-outline-info float-right" href="{!! route('admin.home') !!}">
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
                    <form action="{{route('profile.business.store')}}" method="post" class="wait-on-submit" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" href="#basicas" data-toggle="tab">Basicas</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#seo" data-toggle="tab">SEO</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basicas">
                                        @include('admin.business_profile.basic')
                                    </div>
                                    <div class="tab-pane" id="seo">
                                        @include('admin.business_profile.seo')
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group col-sm-12 text-right mt-3">
                                    <a href="{!! route('profile.business') !!}" class="btn btn-outline-secondary ml-2">Cancelar</a>
                                    <button type="submit"  class="btn btn-outline-success ml-3">Guardar</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>
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



        $("#logo").fileinput({
            language: "es",
            initialPreview: @json(getLogo()),
            dropZoneEnabled: true,
            maxFileCount: 1,
            maxFileSize: 2000,
            showUpload: false,
            initialPreviewAsData: true,
            showBrowse: true,
            showRemove: true,
            theme: "fa",
            browseOnZoneClick: true,
            allowedPreviewTypes: ["image"],
            allowedFileTypes: ["image"],
            initialPreviewFileType: 'image',
        });


        $("#icono").fileinput({
            language: "es",
            initialPreview: @json(getIcono()),
            dropZoneEnabled: true,
            maxFileCount: 1,
            maxFileSize: 2000,
            showUpload: false,
            initialPreviewAsData: true,
            showBrowse: true,
            showRemove: true,
            theme: "fa",
            browseOnZoneClick: true,
            allowedPreviewTypes: ["image"],
            allowedFileTypes: ["image"],
            initialPreviewFileType: 'image',
        });



        $("#fondo_login").fileinput({
            language: "es",
            initialPreview: @json(getFondoLogin()),
            dropZoneEnabled: true,
            maxFileCount: 1,
            maxFileSize: 2000,
            showUpload: false,
            initialPreviewAsData: true,
            showBrowse: true,
            showRemove: true,
            theme: "fa",
            browseOnZoneClick: true,
            allowedPreviewTypes: ["image"],
            allowedFileTypes: ["image"],
            initialPreviewFileType: 'image',
        });
    })
</script>
@endpush
