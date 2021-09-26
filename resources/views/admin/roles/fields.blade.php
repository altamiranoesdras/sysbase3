<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','id' => 'role_name']) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', 'web', ['class' => 'form-control','id' => 'role_guard']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Permisos:') !!} <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>

    {!!
        Form::select(
            'permissions[]',
            select(\App\Models\Permission::class,'name','id',null)
            , null
            , ['class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>

<div class="form-group col-sm-12">

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Opciones del menu</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group col-sm-12">
                <div id="tree"></div>
                <input type="hidden" name="options" id="options">
            </div>
        </div>
        <!-- /.card-body -->
    </div>

</div>


@push('scripts')
    <script>
        $(function () {

            var tree = $('#tree').tree({
                primaryKey: 'id',
                uiLibrary: 'bootstrap4',
                dataSource: "{{route('api.options.index')}}?parentes=1&no_dev=1",
                checkboxes: true
            }).on('checkboxChange', function (e, $node, record, state) {
                var checkedIds = tree.getCheckedNodes();

                $("#options").val(checkedIds);
            });

            tree.on('dataBound', function() {

                @isset($role)
                    @foreach($role->options as $op)
                    tree.check(tree.getNodeById('{{$op->id}}'));
                    @endforeach
                @endisset
            })

        })
    </script>
@endpush
