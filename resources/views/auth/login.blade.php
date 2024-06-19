@extends('adminlte::master')

@section('adminlte_css')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Nunito", sans-serif;
            overflow: hidden;
        }

        @keyframes zoomOut {
            from {
                opacity: 0;
                transform: scale(1.2);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .zoom-out {
            animation: zoomOut .7s ease-in-out;
        }
    </style>
    @yield('css')
@stop

@section('classes_body', 'login-page')

@section('body')
    <div class="d-flex align-items-center justify-content-center" style="min-height: 92vh;">
        <div class="login-box zoom-out" style="width: 30rem;">
            <a href="/" class="login-logo d-flex align-items-center justify-content-center text-decoration-none mb-3">
                <img src="{{ url('assets/img/mendoza.png') }}" height="60" alt="Mendoza Logo" />
                <span style="font-weight: 500;">
                    <b class="text-danger">DR</b><b style="color:#012970;">. MENDOZA</b>
                </span>
            </a>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg" style="font-weight: 900; color:#012970;">Sign in</p>

                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-2">
                            <div class="col-7">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-5">
                                <p class="mb-1">
                                    <a href="{{ route('password.request') }}" class="text-danger"
                                        style="font-weight: 800;">I forgot my password</a>
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block text-light fw-bold"
                                    style="background-color:#012970; font-weight: 700;">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="mb-0">
                                <a href="{{ route('register') }}" class="text-center" style="font-weight: 800;">Register a
                                    New Account</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <div class="copyright zoom-out" style="color:#012970;">
        &copy; Copyright <strong><span>DR. MENDOZA</span></strong>. All Rights Reserved
    </div>
@endsection

@section('adminlte_js')
    @yield('js')
@stop
