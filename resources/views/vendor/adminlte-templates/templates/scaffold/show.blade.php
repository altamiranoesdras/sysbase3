@@extends('layouts.app')

@@section('titulo_pagina', '{{ $config->modelNames->human }}')

@@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">
                        @if($config->options->localized)
                            @@lang('models/{!! $config->modelNames->camelPlural !!}.singular') @@lang('crud.detail')

                        @else
                            {{ $config->modelNames->human }} detalle
                        @endif
                    </h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <div class="dropdown">
                    <a class="btn btn-outline-secondary float-right"
                       href="@{{ url()->previous() }}"
                    >
                        <i class="fa fa-arrow-left"></i>
                        Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="content-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@@endsection
