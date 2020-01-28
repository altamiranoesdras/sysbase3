<!-- Option Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('option_id', 'Option Id:') !!}
    {!! Form::number('option_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruta', 'Ruta:') !!}
    {!! Form::text('ruta', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Icono L Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icono_l', 'Icono L:') !!}
    {!! Form::text('icono_l', null, ['class' => 'form-control']) !!}
</div>

<!-- Icono R Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icono_r', 'Icono R:') !!}
    {!! Form::text('icono_r', null, ['class' => 'form-control']) !!}
</div>

<!-- Orden Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orden', 'Orden:') !!}
    {!! Form::number('orden', null, ['class' => 'form-control']) !!}
</div>
