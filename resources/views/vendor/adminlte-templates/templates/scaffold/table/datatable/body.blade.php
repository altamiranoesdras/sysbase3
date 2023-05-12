@@push('estilos')
{{--    @@include('layouts.datatables_css')--}}
@@endpush

@{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped ']) !!}

@@push('scripts')
{{--    @@include('layouts.datatables_js')--}}
    @{!! $dataTable->scripts() !!}
    <script>
        $(function () {
            var dt = window.LaravelDataTables["dataTableBuilder"];

            //Cuando dibuja la tabla
            dt.on( 'draw.dt', function () {
                $(this).addClass('table-sm table-striped table-bordered table-hover');
                $('[data-toggle="tooltip"]').tooltip();
            });

        })
    </script>
@@endpush
