<div class="form-group col-sm-6">

    {!! Form::label('nombre', 'Opción Superior:') !!}
    <div class="form-group">
        {{$parent->nombre ?? "Ninguna"}}
        <input type="hidden" name="option_id" value="{{$parent->id ?? ""}}">

    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('ruta', 'Ruta:') !!}
    {!! Form::text('ruta', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-6">
    {!! Form::label('ruta', 'Icono izquierdo:') !!}
    {!! Form::text('icono_l', null, ['class' => 'form-control input-icon']) !!}
    @foreach($iconos as $icono)
        <label class="radio-inline">
            @isset($opcion)
                <input type="radio" name="x" id="inputID" value="{{$icono}}" class="radio-iconos" {{$icono==$opcion->icono_l ? "checked" : ''}}>
            @else
                <input type="radio" name="x" id="inputID" value="{{$icono}}" class="radio-iconos">
            @endisset
            <i class="fa {{$icono}}"></i>
        </label>
    @endforeach
</div>

<div class="form-group col-6">

    {!! Form::label('ruta', 'Icono derecho:') !!}
    {!! Form::text('icono_r', null, ['class' => 'form-control input-icon']) !!}
    <label class="radio-inline">
        <input type="radio" name="y" id="inputID" value="" checked>
        ninguno
    </label>
    @foreach($iconos as $icono)
        <label class="radio-inline">
            @isset($opcion)
                <input type="radio" name="y" id="inputID" value="{{$icono}}" class="radio-iconos" {{$icono==$opcion->icono_r ? "checked" : ''}}>
            @else
                <input type="radio" name="y" id="inputID" value="{{$icono}}" class="radio-iconos" >
            @endisset
            <i class="fa {{$icono}}"></i>
        </label>
    @endforeach
</div>
@push('scripts')
    <script>
        $(function () {
            $(".radio-iconos").click(function (e) {
//            e.preventDefault();
                var opcion = $(this).val();
                var input = $(this).parent().parent().find('.input-icon');
                console.log('Cambio icono',opcion,input);

                input.val(opcion)
            });
        })
    </script>
@endpush
