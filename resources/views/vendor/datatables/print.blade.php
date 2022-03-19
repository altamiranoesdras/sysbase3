<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title> {{config('app.name')}} </title>


    <link href="{{ asset('/css/bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <style>
        body {margin: 20px}
    </style>


</head>
{{--    <body onload="window.print()">--}}
    <body >
        <table class="table table-borderless">
            <tr>
                <th  class="text-center">
                    <h3>
                        <i class="fa fa-book"></i>
                        {{ config('app.name') }}
                    </h3>
                    <span class="font-weight-light">Generado por {{ auth()->user()->name }}</span>  <br>
                    <span class="text-sm font-weight-light"> {{ now()->format('d/m/Y H:i') }}</span>
                </th>
            </tr>
        </table>
        <table class="table table-sm table-bordered table-striped">

            <thead>
                <tr>
                    @foreach($data[0] as $key => $value)
                        <th>{!! $key !!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $row)

                    <tr>
                        @foreach($row as $key => $value)
                            @if(is_string($value) || is_numeric($value))
                                <td>{!! $value !!}</td>
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>

        </table>
    </body>
</html>
