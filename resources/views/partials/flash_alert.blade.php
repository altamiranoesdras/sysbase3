
@push('scripts')
<script>
    $(function () {
        @foreach (session('flash_notification', collect())->toArray() as $message)

            @if ($message['overlay'])

                @switch($message['level'])
                    @case("info")
                        alertInfo("{{$message['message']}}");
                    @break
                    @case("success")
                        alertSucces("{{$message['message']}}");
                    @break
                    @case("warning")
                        alertWarning("{{$message['message']}}");
                    @break
                    @case("danger")
                        alertError("{{$message['message']}}");
                    @break
                @endswitch
            @else

                @switch($message['level'])
                    @case("info")
                        iziTi("{{$message['message']}}");
                    @break
                    @case("success")
                        iziTs("{{$message['message']}}");
                    @break
                    @case("warning")
                        iziTw("{{$message['message']}}");
                    @break
                    @case("danger")
                        iziTe("{{$message['message']}}");
                    @break
                @endswitch

            @endif
        @endforeach
    })

    </script>
@endpush
{{ session()->forget('flash_notification') }}
