@extends('adminlte::master')

@section('adminlte_css')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }

        /* Define the zoom-out animation */
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
            animation: zoomOut 0.7s ease-in-out;
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
                <div class="col-6 bg-navy bg-opacity-10 d-flex flex-column align-items-center justify-content-center"
                    style="border-radius: 10px;">
                    <img src="{{ url('assets/img/mendoza.png') }}" alt="Mendoza Logo" width="120" height="120" />
                    <h1 class="text-white text-center mt-1 fw-bold">Welcome to <br>
                        <b class="text-danger">DR.</b> MENDOZA<br>
                        <b class="text-danger">MULTI-SPECIALIST</b> CLINIC
                    </h1>
                </div>

                <!-- Login Form Section -->
                <div class="col-6 d-flex align-items-center">
                    <div class="p-5 w-100">
                        <h3 class="text-center mb-4 fw-semibold">Reset your Password</h3>
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email address</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary w-100">Send Email to Reset Password</button>

                            <div class="text-center mt-3">
                                <p><a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>
                            </div>
                            <div class="text-center mt-0">
                                <p><a href="{{ route('register') }}" class="text-decoration-none">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="login-box zoom-out" style="width: 30rem;">
        <a href="/" class="login-logo d-flex align-items-center justify-content-center text-decoration-none">
            <img src="{{ url('assets/img/mendoza.png') }}" height="60" alt="Mendoza Logo" />
            <span style="font-weight: 500;"><b class="text-danger">DR</b><b style="color:#012970;">. MENDOZA</b></span>
        </a>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg" style="font-weight: 900; color: #DD3545;">Reset Password</p>

                <form action="{{ route('password.email') }}" method="post">
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

                    <div class="row mb-2">
                        <!-- /.col -->
                        <div class="col">
                            <div class="d-flex justify-content-center ">
                                <button type="submit" class="btn btn-block text-light fw-bold"
                                    style="background-color:#012970;"> Email Reset Password</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="mb-1">
                            <a href="{{ route('login') }}" class="text-center" style="font-weight: 800;">I already
                                have an Account
                            </a>
                        </p>
                        <p class="mb-0">
                            <a href="{{ route('register') }}" class="text-center" style="font-weight: 800;">Register
                                a New Account</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div> --}}

@endsection

@section('adminlte_js')
    @yield('js')
@stop
