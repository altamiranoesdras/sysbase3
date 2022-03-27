<div class="col-lg-12">
    <div class="form-row">

        <div class="form-group col-sm-6">
            {!! Form::label('meta_titulo', 'Meta Titulo:') !!}
            {!! Form::text('meta_titulo', config('app.meta_titulo'), ['class' => 'form-control', 'maxlength' => 60]) !!}
        </div>

        <div class="form-group col-sm-12">
            {!! Form::label('meta_descripcion', 'Meta Descripción:') !!}
            {!! Form::textarea('meta_descripcion', config('app.meta_descripcion'), ['class' => 'form-control', 'rows' => 2]) !!}
        </div>

        <div class="form-group col-sm-12">
            {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
            {!! Form::select(
                    'meta_keywords[]',
                     $meta_keywords,
                    $meta_keywords ?? null,
                    ['id' => 'meta_keywords', 'class' => 'form-control','multiple'=>"multiple",'style' => 'width: 100%']
                )
            !!}
        </div>

    </div>
</div>

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {

            // inicializamos el plugin
            $('#meta_keywords').select2({
                tags: true,
                tokenSeparators: [','],
            });
        });
    </script>

@endsection
