@extends('layouts.app')

@section('titulo_pagina',__('Edit User'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>{{__('Edit User')}}</h1>
                </div>
                <div class="col">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('users.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">Listado</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">


            @include('layouts.partials.request_errors')

            <div class="card">
                <div class="card-body">

                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch',"enctype"=>"multipart/form-data",'class' => 'wait-on-submit']) !!}
                        <div class="form-row">

                            @include('admin.users.fields')
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                <button type="submit"  class="btn btn-outline-success">Guardar</button>
                                <a href="{!! route('users.index') !!}" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </div>

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('admin.roles.modal_form_new')
    @include('admin.permissions.modal_form_new')
@endsection
