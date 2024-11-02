{{-- @extends('adminlte::auth.register') --}}
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
                <div class="col-6 d-flex align-items-center p-4">
                    <div class="w-100">
                        <h4 class="text-center mb-2 fw-semibold font">Register your Account</h4>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="fname" class="form-label fw-medium">First Name</label>
                                        <input type="text" name="fname"
                                            class="form-control @error('fname') is-invalid @enderror" id="fname"
                                            value="{{ old('fname') }}" required>
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="mname" class="form-label fw-medium">Middle Name</label>
                                        <input type="text" name="mname"
                                            class="form-control @error('mname') is-invalid @enderror" id="mname"
                                            value="{{ old('mname') }}" required>
                                        @error('mname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="lname" class="form-label fw-medium">Last Name</label>
                                        <input type="text" name="lname"
                                            class="form-control @error('lname') is-invalid @enderror" id="lname"
                                            value="{{ old('lname') }}" required>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="suffix" class="form-label fw-medium">Suffix</label>
                                        <input type="text" name="suffix"
                                            class="form-control @error('suffix') is-invalid @enderror" id="suffix"
                                            value="{{ old('suffix') }}" required>
                                        @error('suffix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="email" class="form-label fw-medium">Email address</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ old('email') }}" required>
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

    <div class="copyright zoom-out" style="color:#012970;">
        &copy; Copyright <strong><span><b class="text-danger">DR</b>. MENDOZA</span></strong>. All Rights Reserved
    </div>
@endsection

@section('adminlte_js')
    @yield('js')
@stop
