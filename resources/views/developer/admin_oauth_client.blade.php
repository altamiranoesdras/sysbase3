@extends('layouts.app')

@section('titulo_pagina',__('Passport Clients'))

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">
                        {{__('Passport Clients')}}
                    </h1>
                </div><!-- /.col -->
                <div class="col">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" id="root">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <passport-clients ></passport-clients>
                            <passport-authorized-clients></passport-authorized-clients>
                            <passport-personal-access-tokens></passport-personal-access-tokens>
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
        new Vue({
            el: '#root',
            mounted() {
                // console.log('Instancia vue montada');
            },
            created() {
                // console.log('Instancia vue creada');
            },
            data: {
            },
            methods: {
                getDatos(){
                    // console.log('Metodo Get Datos');
                }
            }
        });
    </script>
@endpush

