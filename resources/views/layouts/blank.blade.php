<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield("title_page") - {{config('app.name')}} </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .background-image {
            position: absolute;
            left: 0;
            top: 0;
            background: url("{{asset('/img/fondo_login.png')}}") no-repeat;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            width: 100%;
            height: 100%;
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
            z-index: -999999;
        }
    </style>


</head>
<body class="hold-transition login-page">
    <div class="background-image"></div>

    @yield('content')

    <script src="{{asset("js/sparkline.js")}}"></script>

    <script src="{{asset("js/moment.min.js")}}"></script>
    <script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

</body>
</html>

