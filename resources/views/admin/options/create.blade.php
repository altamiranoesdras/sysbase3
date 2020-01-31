@extends('layouts.app')

@section('title_page',__('New Option'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('New Option')}}</h1>
                </div>
                <div class="col ">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('options.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('List')}}</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            @include('partials.flash_alert')
            @include('layouts.partials.request_errors')

            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'options.store']) !!}
                        <div class="form-row">

                            @include('admin.options.fields')
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                <button type="submit" onClick="this.form.submit(); this.disabled=true;" class="btn btn-outline-success">Guardar</button>
                                <a href="{!! route('options.index') !!}" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
