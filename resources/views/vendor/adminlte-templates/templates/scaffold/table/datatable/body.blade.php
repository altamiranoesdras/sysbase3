@@push('estilos')
{{--    @@include('layouts.datatables_css')--}}
@@endpush

<div class="card-body px-4">
    @{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
</div>

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
