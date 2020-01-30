<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>


<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avatar', 'Avatar:') !!}
    <div class="custom-file">
        <input type="file" name="avatar" class="custom-file-input" >
        <label class="custom-file-label" for="exampleInputFile">{{__("Choose file")}}</label>
    </div>
</div>



<div class="form-group col-sm-12">
    {!! Form::label('name', 'Roles:') !!}

    {!!
        Form::select(
            'roles[]',
            select(\App\Models\Role::class,'name','id',null)
            , null
            , ['id'=>'roless','class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>


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
