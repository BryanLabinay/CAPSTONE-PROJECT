{{-- @extends('adminlte::auth.register') --}}
@extends('adminlte::master')

@section('adminlte_css')
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">
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
            animation: zoomOut 0.7s ease-in-out;
        }
    </style>
    @yield('css')
@stop

@section('classes_body', 'register-page')

@section('body')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="login-box zoom-out bg-light shadow" style="width: 55rem; border-radius: 10px;">
            <div class="row p-0 g-0 rounded-2">
                <!-- Image Carousel Section -->
                <div class="col-6 bg-navy bg-opacity-10 d-flex flex-column align-items-center justify-content-center p-4"
                    style="border-radius: 10px;">
                    <img src="{{ url('assets/img/mendoza.png') }}" alt="Mendoza Logo" width="120" height="120" />
                    <h1 class="text-white text-center mt-0 fw-bold">Welcome to <br>
                        <b class="text-danger">DR. MENDOZA</b> <br>
                        <b class="text-danger">MULTI-SPECIALIST</b> CLINIC
                    </h1>
                </div>

                <!-- Login Form Section -->
                <div class="col-6 d-flex align-items-center p-4">
                    <div class="w-100">
                        <h4 class="text-center mb-2 fw-semibold">Register your Account</h4>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label for="name" class="form-label fw-medium">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter your Full Name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
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
                            <div class="mb-2">
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
                            <div class="mb-2">
                                <label for="password_confirmation" class="form-label fw-medium">Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" placeholder="Retype your password" required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                            <div class="text-center mt-3">
                                <p>Already have an account? <a href="{{ route('login') }}"
                                        class="text-decoration-none">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="d-flex align-items-center justify-content-center" style="min-height: 92vh;">
        <div class="register-box zoom-out" style="width: 30rem;">
            <a href="/"
                class="register-logo d-flex align-items-center justify-content-center text-decoration-none mb-3">
                <img src="{{ url('assets/img/mendoza.png') }}" height="60" alt="Mendoza Logo" />
                <span style="font-weight: 500;">
                    <b class="text-danger">DR</b><b style="color:#012970;">. MENDOZA</b>
                </span>
            </a>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg" style="font-weight: 900; color:#012970;">Register a New Account</p>

                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Full name" value="{{ old('name') }}" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}" required>
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

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Retype password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="terms" id="terms"
                                        {{ old('terms') ? 'checked' : '' }}>
                                    <label for="terms">
                                        I agree to the <a href="#">terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block text-light fw-bold"
                                    style="background-color:#012970; font-weight: 700;">Register</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="mt-3 mb-1">
                                <a href="{{ route('login') }}" style="font-weight: 800;">I already have an Account</a>
                            </p>
                        </div>
                    </div>
                </div>
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
