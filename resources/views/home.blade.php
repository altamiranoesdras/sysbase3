@extends('layouts.app')

@section('titulo_pagina',__('Home'))

@include('layouts.plugins.jquery-ui')

@section('content')

    <div id="root">

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            Bienvenido {{Auth::user()->name}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <button class="btn btn-outline-primary float-right" :class="{'btn-outline-success' : editando}" @click="editando=!editando">
                        <i class="fa fa-edit" v-if="!editando"></i>
                        <i class="fa fa-save" v-if="editando"></i>
                        <span class="d-none d-sm-inline" v-if="!editando">
                            {{__('Edit Shortcuts')}}
                        </span>
                        <span class="d-none d-sm-inline" v-if="editando">
                            {{__('Finish edition')}}
                        </span>
                    </button>

                </div>
            </div>
        </div>


        <!-- Main content -->

        <div class="content-body">
            <br>
            <div class="row">

                <div class="col-6 col-lg-3 px-2" v-for="shortcut in user.shortcuts">


                    <div class="card text-center">
                        <span class="badge rounded-pill bg-danger badge-up badge-glow" v-if="editando">
                            <button type="button" class="btn btn-flat-warning btn-sm px-1" @click="removerAcceso(shortcut)">
                                <i class="fa fa-trash fa-3x  text-white"></i>
                            </button>
                        </span>
                        <a :href="shortcut.ruta_evaluada" >
                            <div class="card-body p-1">
                                <div class="avatar p-50 mb-1" :class="shortcut.color">
                                    <div class="avatar-content">
                                        <i class="fa fa-2x" :class="shortcut.icono_l" style="color: white !important;"></i>
                                    </div>
                                </div>
                                <p class="card-text" v-text="shortcut.nombre">
                                </p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>

            <div class="row" v-show="editando">

                <div class="col-12">
                    <hr>
                    <br>
                </div>

                <div class="col-6 col-lg-3 px-2" v-for="option in opcionesFiltradas">

                    <div class="card text-center">
                        <span class="badge rounded-pill bg-success badge-up badge-glow" v-if="editando">
                            <button type="button" class="btn btn-flat-warning btn-sm px-1" @click="agregarAcceso(option)">
                                <i class="fa fa-plus text-white"></i>
                            </button>
                        </span>
                        <a :href="option.ruta_evaluada" >
                            <div class="card-body p-1">
                                <div class="avatar p-50 mb-1" :class="option.color">
                                    <div class="avatar-content">
                                        <i class="fa fa-2x" :class="option.icono_l" style="color: white !important;"></i>
                                    </div>
                                </div>
                                <p class="card-text" v-text="option.nombre">
                                </p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>

        </div>




    </div>


    <!-- Modal -->

@endsection

@push('scripts')
    <script src="{{asset('app-assets/vendors/js/blockui/blockui.min.js')}}"></script>
    <script>
        const app = new Vue({
            el: '#root',
            created() {
                this.getData();
            },
            data: {
                user : @json($user),
                editando: false,
            },
            methods: {
                async getData(){


                    try {
                        let res = await axios.get(route("api.users.show",this.user.id));

                        this.user = res.data.data;
                        logI(res);

                    }catch (e) {
                        notifyErrorApi(e)
                    }
                },
                async agregarAcceso(option){

                    this.bloquear();

                    try {
                        let res = await axios.post(route("api.users.add_shortcut",this.user.id), {'option' : option.id});

                        this.getData();

                        iziTs(res.data.message);

                        logI(res);

                    }catch (e) {
                        notifyErrorApi(e)
                    }

                    this.desbloquear();
                },
                async removerAcceso(option){

                    this.bloquear();
                    logI('remove shortcut',option);


                    try {
                        let res = await axios.post(route("api.users.remove_shortcut",this.user.id),{'option' : option.id});

                        iziTs(res.data.message);
                        this.getData();
                        logI(res);

                    }catch (e) {

                        notifyErrorApi(e)

                    }

                    this.desbloquear();
                },
                bloquear(){
                    $.blockUI({
                        message: `
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="me-50 mb-0">{{__('Please wait')}}...</p>
                                <div class="spinner-grow spinner-grow-sm text-white" role="status">
                                </div>
                            </div>
                        `,
                        css: {
                            backgroundColor: 'transparent',
                            color: '#fff',
                            border: '0'
                        },
                        overlayCSS: {
                            opacity: 0.5
                        }
                    });
                },
                desbloquear(){
                    $.unblockUI();
                }
            },
            computed: {
                opcionesFiltradas(){
                    return this.user.options.filter( (opcion) => {
                        let esAcceso = this.user.shortcuts.find(shortcut => shortcut.id == opcion.id)

                        if (!esAcceso && opcion.ruta!=''){
                            return  opcion;
                        }

                    });
                }
            }

        });

        $(function(){



            $( ".sortable" ).sortable({
                update: function( event, ui ) {

                    var  opciones=[];
                    $(this).find('li').each(function (index,elemet) {
                        opciones.push($(this).attr('id'));
                    });

                }
            }).disableSelection();

        });
    </script>


@endpush

