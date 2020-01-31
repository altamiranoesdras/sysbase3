@extends('layouts.app')

@section('title_page',__('Show Permission'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permission</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        @include('admin.permissions.show_fields')
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">{{__('Back')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
