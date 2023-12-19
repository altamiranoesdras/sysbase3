@extends('layouts.app')

@section('titulo_pagina',__('Home'))

@include('layouts.plugins.jquery-ui')

@section('content')

    <div id="root">


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bienvenido {{auth()->user()->name}}</h1>
                    </div>
                    <div class="col ">
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
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->


        <div class="content">
            <div class="container-fluid ">



                <div class="row px-2 sortable">

                    <div class="col-6 col-lg-2 px-4 py-2 " v-for="shortcut in shortcuts">


                        <div class="card text-center opciones-ordenar" :data-id="shortcut.id">

                            <span class="badge bg-danger" v-if="editando">
                                <button type="button" class="btn btn-outline-danger btn-sm rounded-circle" @click="removerAcceso(shortcut)">
                                    <i class="fa fa-trash  text-white"></i>
                                </button>
                            </span>

                            <a :href="shortcut.ruta_evaluada" >
                                <div class="card-body p-1">


                                    <span class="fa-stack fa-xl my-2" >
                                      <i class="fa fa-circle fa-stack-2x " :class="shortcut.color"></i>
                                      <i class="fa fa-stack-1x fa-inverse" :class="shortcut.icono_l"></i>
                                    </span>

                                    <p class="card-text mb-2" v-text="shortcut.nombre"></p>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="row px-2" v-show="editando">

                    <div class="col-12">
                        <hr>
                        <br>
                    </div>

                    <div class="col-6 col-lg-2 px-4" v-for="option in opcionesSinAgregar">

                        <div class="card text-center">
                            <span class="badge bg-success " v-if="editando">
                                <button type="button" class="btn btn-flat-warning btn-sm px-1" @click="agregarAcceso(option)">
                                    <i class="fa fa-plus text-white"></i>
                                </button>
                            </span>
                            <a :href="option.ruta_evaluada" >
                                <div class="card-body p-1">


                                    <span class="fa-stack fa-xl my-2" >
                                      <i class="fa fa-circle fa-stack-2x " :class="option.color"></i>
                                      <i class="fa fa-stack-1x fa-inverse" :class="option.icono_l"></i>
                                    </span>

                                    <p class="card-text mb-2" v-text="option.nombre"></p>
                                </div>
                            </a>
                        </div>

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
        const vmShortcuts = new Vue({
            el: '#root',
            created() {
                this.getData();
            },
            data: {
                user : @json($user),
                shortcuts : [],
                editando: false,
            },
            methods: {
                async getData(){


                    try {
                        let res = await axios.get(route("api.users.shortcuts",this.user.id));

                        this.shortcuts = res.data.data;

                    }catch (e) {
                        notifyErrorApi(e)
                    }
                },
                async agregarAcceso(option){

                    esperar();

                    try {
                        let res = await axios.post(route("api.users.add_shortcut",this.user.id), {'option' : option.id});

                        await this.getData();

                        iziTs(res.data.message);

                        logI(res);

                    }catch (e) {
                        notifyErrorApi(e)
                    }

                    finEspera();
                },
                async removerAcceso(option){

                    esperar();

                    try {

                        let res = await axios.post(route("api.users.remove_shortcut",this.user.id),{'option' : option.id});

                        await this.getData();

                        iziTs(res.data.message);

                    }catch (e) {

                        notifyErrorApi(e)

                    }

                    finEspera();
                },
                async actualizarOrden(orden){

                        console.log(orden);
                        esperar();

                        try {

                            let res = await axios.post(route("api.users.update_shortcut_order",this.user.id),{'orden' : orden});


                            iziTs(res.data.message);

                        }catch (e) {

                            notifyErrorApi(e)

                        }

                        finEspera();
                }
            },
            computed: {
                opcionesSinAgregar(){
                    return this.user.options.filter( (opcion) => {
                        let esAcceso = this.shortcuts.find(shortcut => shortcut.id === opcion.id)

                        if (!esAcceso && opcion.ruta!==''){
                            return  opcion;
                        }

                    });
                }
            }

        });

        $(function(){



            $( ".sortable" ).sortable({
                update: async function( event, ui ){

                    var  orden=[];
                    $(this).find('.opciones-ordenar').each(function () {
                        orden.push($(this).data('id'));
                    });

                    await vmShortcuts.actualizarOrden(orden);
                }
            }).disableSelection();

        });
    </script>


@endpush

@push('css')
    <style>
        .card > .badge {
            font-size: 10px;
            font-weight: 400;
            position: absolute;
            right: -20px;
            top: -20px;
        }
    </style>
@endpush

