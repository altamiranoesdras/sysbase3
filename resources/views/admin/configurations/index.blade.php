@extends('layouts.app')

@section('title_page',__('Configurations'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configurations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="btn btn-outline-success"
                                href="{!! route('configurations.create') !!}">
                                <i class="fa fa-plus"></i>
                                <span class="d-none d-sm-inline">{{__('New')}}</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="clearfix"></div>

            @include('partials.flash_alert')

            <div class="clearfix"></div>
            <div class="card card-primary">
                <div class="card-body">
                        @include('admin.configurations.table')
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

