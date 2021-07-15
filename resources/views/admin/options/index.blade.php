@extends('layouts.app')

@section('title_page',__('Options'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Options</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="btn btn-outline-success"
                                href="{!! route('options.create') !!}">
                                <i class="fa fa-plus"></i>
                                <span class="d-none d-sm-inline">{{__('New')}}</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="clearfix"></div>



            <div class="clearfix"></div>
            <div class="card card-primary">
                <div class="card-body">
                    <ul class="list-group sortable" >
                        @include('admin.options.partials.list_admin')
                    </ul>
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script>
        $(function(){


            $( ".sortable" ).sortable({
                update: function( event, ui ) {

                    var  opciones=[];
                    $(this).find('li').each(function (index,elemet) {
                        opciones.push($(this).attr('id'));
                    });

                    var url = "{{route("option.order.store")}}";
                    var params= { params: {opciones: opciones} };

                    console.log(opciones,url);

                    axios.get(url,params).then(response => {
                        console.log(response.data);
                        alertSucces(response.data.message);
                    })
                    .catch(error => {
                        if(error.response){
                            console.log('respuesta ajax: ',error.response.data);

                            alertWarning("Ooops...",error.response.data.message,null)
                        }else {
                            console.log(error);
                        }
                    });

                }
            }).disableSelection();
        });
    </script>
@endpush

