@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/dist/css/select2.min.css')}}" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        color: #0A0A0A;
    }
</style>
@endpush
@push('scripts')
<script type="text/javascript" src="{{asset('plugins/select2/dist/js/select2.full.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/select2/dist/js/i18n/es.js')}}"></script>
<!--            Scripts para select2-simple
------------------------------------------------------------------------>

<script>
    $(function () {
        $(".select2-simple").select2({
            placeholder: 'Seleccione uno...',
            language: "es",
            maximumSelectionLength: 1,
            allowClear: true
        });
        $(".select2-multi").select2({
            placeholder: 'Seleccione uno...',
            language: "es",
            allowClear: true
        });
    })
</script>
@endpush
