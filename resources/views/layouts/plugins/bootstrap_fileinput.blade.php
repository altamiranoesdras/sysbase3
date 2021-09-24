@push('css')
<link rel="stylesheet" href="{{asset('plugins/bootstrap-fileinput/css/fileinput.min.css')}}" />
@endpush
@push('scripts')
    <script>
        $(function (){
            $.fn.fileinput.defaults.language = 'es';
        })
    </script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap-fileinput/js/locales/es.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap-fileinput/themes/fa/theme.min.js')}}"></script>
@endpush
