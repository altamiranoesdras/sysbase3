<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{{--<!-- Guard Name Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('guard_name', 'Guard Name:') !!}--}}
{{--    {!! Form::text('guard_name', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Permisos:') !!}

    {!!
        Form::select(
            'permissions[]',
            select(\App\Models\Permission::class,'name','id',null)
            , null
            , ['id'=>'permissionss','class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>
