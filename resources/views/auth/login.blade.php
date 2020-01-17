<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Login') }}</title>

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
<div class="login-box">
    <div class="login-logo text-dark text-uppercase text-bold"  >
        <a href="{{ route('home') }}"><b style="color: black !important;">{{ config('app.name', 'Laravel') }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{__("Sign in to start your session")}}</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
{{--                    <input type="email" class="form-control" placeholder="Email">--}}
                    <input id="username" type="username"
                           class="form-control @error('username') is-invalid @enderror"
                           name="username" value="{{ old('username') }}"
                           required autocomplete="email" autofocus
                           placeholder="{{__('Username')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>


                    @error('username')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password"
                           placeholder="{{__('Password')}}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- {{__("OR")}} -</p>
                <a href="{{ route('social_auth', ['driver' => 'facebook']) }}" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> {{__("Sign in using Facebook")}}
                </a>
                <a href="{{ route('social_auth', ['driver' => 'google']) }}"
                   class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> {{__("Sign in using Google+")}}
                </a>
                <a href="{{ route('social_auth', ['driver' => 'github']) }}"
                    class="btn btn-block btn-default">
                    <i class="fab fa-github-alt mr-2"></i> {{ __("Sign in using Github") }}
                </a>
            </div>
            <!-- /.social-auth-links -->




            <p class="mb-1">
                @if (Route::has('password.request'))
                    <a class="text-center" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </p>
            <p class="mb-0">
                <a href="{{route("register")}}" class="text-center">
                    {{__("Register a new membership")}}
                </a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<script src="{{asset("js/sparkline.js")}}"></script>

<script src="{{asset("js/moment.min.js")}}"></script>
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

</body>
</html>

