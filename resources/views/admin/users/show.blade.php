@extends('layouts.app')

@section('title_page',__('User'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('User')}}</h1>
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
                    <div class="form-group col-sm-4">
                        <img src="{{$user->img}}" alt="" class="img-fluid">
                    </div>
                    <div class="form-group col-sm-8">
                        @include('admin.users.show_fields')
                    </div>
                    <div class="form-group mt-3 mb-0">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">{{__('Back')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
