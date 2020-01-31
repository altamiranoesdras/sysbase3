
@push('scripts')
<script>
    $(function () {
        @foreach (session('flash_notification', collect())->toArray() as $message)

            @if ($message['overlay'])

                @switch($message['level'])
                    @case("info")
                        alertInfo("{{__($message['message'])}}");
                    @break
                    @case("success")
                        alertSucces("{{__($message['message'])}}");
                    @break
                    @case("warning")
                        alertWarning("{{__($message['message'])}}");
                    @break
                    @case("danger")
                        alertError("{{__($message['message'])}}");
                    @break
                @endswitch
            @else

                @switch($message['level'])
                    @case("info")
                        iziTi("{{__($message['message'])}}");
                    @break
                    @case("success")
                        iziTs("{{__($message['message'])}}");
                    @break
                    @case("warning")
                        iziTw("{{__($message['message'])}}");
                    @break
                    @case("danger")
                        iziTe("{{__($message['message'])}}");
                    @break
                @endswitch

            @endif
        @endforeach
    })

    </script>
@endpush
{{ session()->forget('flash_notification') }}
