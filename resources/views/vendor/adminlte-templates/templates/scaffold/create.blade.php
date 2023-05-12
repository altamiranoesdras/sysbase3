@@extends('layouts.app')

@@section('titulo_pagina', 'Crear {{$config->modelNames->human}}')

@@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear {{ $config->modelNames->human }}</h1>
                </div>
                <div class="col ">
                    <a class="btn btn-outline-info float-right"
                       href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural  !!}.index') }}"
                        >
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
                        <span class="d-none d-sm-inline">Regresar</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">

            @@include('layouts.partials.request_errors')

            <div class="card">
                <div class="card-body">

                    @{!! Form::open(['route' => '{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.store','class' => 'esperar']) !!}
                    <div class="form-row">

                        @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.fields')

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12 mt-2 text-right">

                            <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}"
                               class="btn btn-outline-secondary round me-1 mr-1">
                                <i class="fa fa-ban"></i>
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success round">
                                <i class="fa fa-save"></i>
                                Guardar
                            </button>
                        </div>
                    </div>
                    @{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@@endsection
