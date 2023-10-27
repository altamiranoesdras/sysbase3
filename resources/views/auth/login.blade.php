@extends('layouts.blank')

@section('titulo_pagina',__('Login'))

@section('content')

    <div class="login-box">
        <div class="login-logo text-dark text-uppercase text-bold"  >
            <a href="{{ route('home') }}"><b style="color: black !important;">{{ config('app.name', 'Laravel') }}</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                @include('layouts.partials.request_errors')

                <p class="login-box-msg">{{__("Sign in to start your session")}}</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">

                        <input id="login" type="text"
                               class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                               name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>


                        @if ($errors->has('username') || $errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                            </span>
                        @endif


                    </div>

{{--                    <div class="input-group mb-3">--}}

{{--                        <input id="username" type="username"--}}
{{--                               class="form-control @error('username') is-invalid @enderror"--}}
{{--                               name="username" value="{{ old('username') }}"--}}
{{--                               required autocomplete="username" autofocus--}}
{{--                               placeholder="{{__('Username')}}">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <div class="input-group-text">--}}
{{--                                <span class="fas fa-user"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        @error('username')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}


{{--                    </div>--}}
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


{{--                @include('partials.social_links')--}}


                <p class="mb-1">
                    @if (Route::has('password.request'))
                        <a class="text-center" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </p>
{{--                <p class="mb-0">--}}
{{--                    <a href="{{route("register")}}" class="text-center">--}}
{{--                        {{__("Register a new membership")}}--}}
{{--                    </a>--}}
{{--                </p>--}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
