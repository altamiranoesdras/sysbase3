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
