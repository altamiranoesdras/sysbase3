@extends('layouts.app')

@section('htmlheader_title',__('Home'))

@push('css')

    <style>
        .small-box {
            /*max-width: 10rem;*/
        }
        .small-box-footer {
            padding-bottom: 0.5rem;
            padding-top: 0.5rem;
            font-size: 1rem;
            font-weight: bold;
        }
        li > span.move  {
            cursor: move;
        }
    </style>
@endpush


@section('content')

    <div id="root">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h1 class="m-0 text-dark">Bienvenido {{Auth::user()->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col ">
                        <button class="btn btn-outline-primary float-right" @click="editShortcut()">
                            <i class="fa fa-edit"></i>
                            <span class="d-none d-sm-inline">
                            {{__('Edit Shortcuts')}}
                        </span>
                        </button>
                        <button class="btn btn-outline-success float-right mr-3" @click="newShortcut()">
                            <i class="fa fa-plus"></i>
                            <span class="d-none d-sm-inline">
                            {{__('New Shortcut')}}
                        </span>
                        </button>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content" >
            <div class="container-fluid">


                <div class="row">

                    <div class="col-6 col-lg-2 px-4" v-for="shortcut in user.shortcuts">
                        <!-- small card -->
                        <a :href="shortcut.ruta_evaluada" >
                            <div class="small-box text-center p-0" :class="shortcut.color">
                                <div class="inner">
                                    <h1 class="m-0">
                                        <i class="fa fa-2x" :class="shortcut.icono_l" style="color: white !important;"></i>
                                    </h1>

                                </div>
                                <span class="small-box-footer">
								    <span v-text="shortcut.nombre"></span>
                                    <i class="fa fa-arrow-circle-right"></i>
							    </span>
                            </div>
                        </a>
                    </div>



                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->


        <!-- Modal -->
        <div class="modal fade" id="modalEditShortCuts" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId">
                            {{__('Edit your shortcuts')}}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12"  >
                                <div class="table-responsive">
                                    <ul class=" list-group sortable">
                                        <li  class="list-group-item py-2"  v-for="(op,index) in user.shortcuts">
                                            <span class="move border-right mr-2 pr-2">
                                                <i class="fa fa-arrows-alt-v "></i>
                                            </span>
                                            <i class="fa " :class="op.icono_l"></i>
                                            <span v-text="op.nombre"></span>
                                            <button type="button" class="btn btn-xs btn-outline-danger" @click.prevent="removeShortcut(op,index)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="button" class="btn btn-primary">{{__('Save')}}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalOptionUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId">
                            Nuevo {{__('Shortcut')}}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 col-lg-3 p-3"  v-for="op in user.options">
                                <!-- small card -->
                                <button type="button" @click.prevent="addShortcut(op)">

                                    <div class="small-box text-center" :class="op.color">
                                        <div class="inner">
                                            <h1>
                                                <i class="fa fa-2x" :class="op.icono_l" style="color: white !important;"></i>
                                            </h1>
                                        </div>
                                        <span class="small-box-footer">
                                            <span v-text="op.nombre"></span>
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->

@endsection

@push('scripts')
    <script>
        const app = new Vue({
            el: '#root',
            created() {
                this.getData();
            },
            data: {
                user : [],
            },
            methods: {
                async getData(){
                    this.user= [];
                    let url = "{{route("api.users.show",auth()->user()->id)}}";

                    try {
                        let res = await axios.get(url);

                        this.user = res.data.data;


                        logI(res);

                    }catch (e) {
                        if(e.response.data){
                            logI(e.response.data);
                        }else{
                            logI(e);
                        }

                    }
                },
                newShortcut(){
                    $("#modalOptionUser").modal('show');
                },
                editShortcut(){
                    $("#modalEditShortCuts").modal('show');
                },
                async addShortcut(option){
                    let url = "{{route("api.users.add_shortcut",auth()->user()->id)}}";

                    url = url+"?option="+option.id;

                    try {
                        let res = await axios.get(url);

                        this.user = res.data.data;

                        this.getData();
                        iziTs(res.data.message);
                        logI(res);

                    }catch (e) {
                        if(e.response.data){
                            logI(e.response.data);
                            iziTe(e.response.data.message);
                        }else{
                            logI(e);
                        }

                    }
                },
                async removeShortcut(option,index){

                    logI('remove shortcut',option,index);

                    let url = "{{route("api.users.remove_shortcut",auth()->user()->id)}}";

                    url = url+"?option="+option.id;

                    try {
                        let res = await axios.get(url);

                        iziTs(res.data.message);
                        this.user.shortcuts.splice(index,1);
                        logI(res);

                    }catch (e) {


                        if(e.response.data){
                            logI(e.response.data);
                            iziTe(e.response.data.message);
                        }else{
                            logI(e);
                        }

                    }
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

