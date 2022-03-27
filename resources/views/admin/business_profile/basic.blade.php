<div class="col-lg-12">
    <div class="form-row">

        <div class="form-group col-sm-4">
            {!! Form::label('nombre_negocio', 'Nombre Empresa:') !!}
            {!! Form::text('name', config('app.name'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('telefono_negocio', 'Teléfono Empresa:') !!}
            {!! Form::text('telefono_negocio', config('app.telefono_negocio'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('whatsapp_negocio', 'Whatsapp Empresa:') !!}
            {!! Form::text('whatsapp_negocio', config('app.whatsapp_negocio'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('direccion_negocio', 'Dirección Empresa:') !!}
            {!! Form::text('direccion_negocio', config('app.direccion_negocio'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('correo_negocio', 'Correo Empresa:') !!}
            {!! Form::text('correo_negocio', config('app.correo_negocio'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('horario_negocio', 'Horario:') !!}
            {!! Form::text('horario_negocio', config('app.horario_negocio'), ['class' => 'form-control','placeholder' => '9:00am - 6:00pm']) !!}
        </div>


        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Logo:') !!}
            <input type="file" name="logo" class="form-control" id="logo">
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Fondo Login:') !!}
            <input type="file" name="fondo_login" class="form-control" id="fondo_login">
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Icono:') !!}
            <span class="text-muted">
                                                Se utliza en diferntes lugares como: favicon, pwa, preload
                                            </span>
            <input type="file" name="icono" class="form-control" id="icono">
        </div>
    </div>
</div>
