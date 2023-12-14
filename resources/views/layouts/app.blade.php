<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield("titulo_pagina") - {{config('app.name')}} </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <link rel="manifest" href="{{asset('manifest.json')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('icons/180.png')}}" />
    <meta name="theme-color" content="#007BFF">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!--            Estilos inyectados
    ------------------------------------------------------------------------>
    @yield('css')
    @stack('css')
    @stack('estilos')

</head>
<body class="hold-transition sidebar-mini layout-fixed ">
<div class="wrapper">



    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @can('access_option')
            @yield('content')
        @else
            @include('partials.no_acces_to_option')
        @endcan
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>
            Copyright &copy; 2014-{{anioActual()}}
            <a href="https://solucionesaltamirano.com/">Soluciones Altamirano</a>.
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


{{--Para utilizar las rutas en java script https://github.com/tighten/ziggy--}}
@routes

@include('partials.flash_alert')

<script src="{{asset("js/sparkline.js")}}"></script>

<script src="{{asset("js/moment.min.js")}}"></script>

<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<script>
    @if(appIsDebug())
        logW("Modo Debug Activo")
    @else
        logConfig.stopLogging = true;
    @endif


</script>

<!--            Scripts inyectados
------------------------------------------------------------------------>
@yield('scripts')
@stack('scripts')

</body>
</html>
