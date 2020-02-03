@extends('layouts.app')

@section('title_page','Prueba Apis')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Prueba Apis</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" id="root">
        <div class="container-fluid">
            @include('partials.flash_alert')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" @submit.prevent="runApi()">

                                <div class="form-row">

                                    <div class="form-group col-sm-3">
                                        {!! Form::label('method','Method:',["autocomplete" => "on"]) !!}
                                        {!!
                                            Form::select(
                                                'method',
                                                ['post' => 'post','get' => 'get','put' => 'put','patch' =>'patch','delete' => 'delete']
                                                , "post"
                                                , ['v-model'=>'method','class' => 'form-control','style'=>'width: 100%']
                                            )
                                        !!}
                                    </div>
                                    <div class="form-group col-sm-9">
                                        {!! Form::label('api', 'API:') !!}
                                        <input type="text" v-model="uri" class="form-control" placeholder="ej: api/items">
                                    </div>
                                    <div class="form-group col-sm-10">
                                        {!! Form::label('params', 'Parametros (en forma de objeto sin llaves EJ: hola : mundo , soy : juan):') !!}
                                        <input type="text" v-model="params" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-2">
                                        {!! Form::label('boton','&nbsp;') !!}
                                        <div>
                                            <button type="submit" id="boton" class="btn btn-info">Probar</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

                <div class="col-sm-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Resultado</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >
                            <pre>

                                <h1 class="text-center" v-show="loading">
                                    <i class="fa fa-sync-alt fa-spin"></i>
                                </h1>
                                <p >@{{ result }}</p>
                            </pre>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('scripts')
<script>
    const app = new Vue({
        el: '#root',
        created() {

        },
        data: {
            method : 'get',
            baseUrl : '{{ url('/')}}',
            uri : '',
            params : '',
            result : '',
            loading : false,

        },
        methods: {
            runApi(){
                var url = this.baseUrl+'/'+this.uri;
                var method = this.method;
                var params = {};

                if(this.params.length > 0){

                    $.each(this.params.split(','),function (index,element) {
                        const temp = element.split(':');
                        const [i, v] = temp;
                        params[i.trim()]=v.trim();

                    });
                }

                log(url);
                log(method);
                log(params);

                var params = {params : params };


                this.loading = true;
                switch (method) {
                    case 'post':
                            axios.post(url,params).then(response => {
                                this.result = response;
                                this.loading = false;
                            })
                            .catch(error => {
                                this.result = error.response;
                                this.loading = false;
                            });
                        break;
                    case 'get':
                            axios.get(url,params).then(response => {
                                this.result = response;
                                this.loading = false;
                            })
                            .catch(error => {
                                this.result = error.response;
                                this.loading = false;
                            });
                        break;
                    case 'put':
                            axios.put(url,params).then(response => {
                                this.result = response;
                                this.loading = false;
                            })
                            .catch(error => {
                                this.result = error.response;
                                this.loading = false;
                            });
                        break;
                    case 'patch':
                            axios.patch(url,params).then(response => {
                                this.result = response;
                                this.loading = false;
                            })
                            .catch(error => {
                                this.result = error.response;
                                this.loading = false;
                            });
                        break;
                    case 'delete':
                            axios.delete(url,params).then(response => {
                                this.result = response;
                                this.loading = false;
                            })
                            .catch(error => {
                                this.result = error.response;
                                this.loading = false;
                            });
                        break;

                }

                this.result = url;

            }
        }
    });
</script>
@endpush

