@extends('adminlte::master')

@section('adminlte_css')
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">

    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/custom-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            overflow: hidden;
        }

        .font {
            font-family: "Nunito";
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
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="login-box zoom-out bg-light shadow" style="width: 55rem; border-radius: 10px;">
            <div class="row g-0 p-0 rounded-2">
                <!-- Image Carousel Section -->
                <div class="col-6">
                    <div
                        class="bg-navy border border-danger border-3 rounded-3 d-flex flex-column align-items-center justify-content-center h-100">
                        <img src="{{ url('assets/img/mendoza.png') }}" alt="Mendoza Logo" width="150" height="150" />
                        <h2 class="text-white text-center mt-1 fw-bold">Welcome to <br>
                            DR. MENDOZA<br>
                            MULTI-SPECIALIST CLINIC
                        </h2>
                    </div>
                </div>


                <!-- Login Form Section -->
                <div class="col-6 d-flex align-items-center">
                    <div class="p-4 w-100">
                        <h4 class="text-center mb-4 fw-semibold font">Login to your Account</h4>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Enter your password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                            <div class="text-center mt-3">
                                <a href="{{ route('password.request') }}" class="text-decoration-none text-danger">Forgot
                                    password?</a>
                            </div>
                            <div class="text-center mt-3">
                                <p>Don't have an account? <a href="{{ route('register') }}"
                                        class="text-decoration-none">Sign up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="d-flex align-items-center justify-content-center" style="min-height: 92vh;">
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
    </div> --}}
    <div class="copyright zoom-out" style="color:#012970;">
        &copy; Copyright <strong><span><b class="text-danger">DR</b>. MENDOZA</span></strong>. All Rights Reserved
    </div>
@endsection

@section('adminlte_js')
    @yield('js')
@stop
