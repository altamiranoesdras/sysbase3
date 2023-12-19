@@extends('layouts.app')

@@section('titulo_pagina', '{{ $config->modelNames->human }}')

@@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{ $config->modelNames->human }} detalle
                    </h1>
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

            <div class="row">
                <div class="col-12">


                    <div class="card">


                        <div class="card-body">

                            <div class="form-row">

                                @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.show_fields')

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@@endsection
