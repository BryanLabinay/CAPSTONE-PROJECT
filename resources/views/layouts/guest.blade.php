<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E.A MENDOZA APPOINTMENT</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ 'Image/logo/mendoza.png' }}" type="image/x-icon">
    <!--- Bootstrap --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('Css/login.css') }}">
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-2 navbar-light sticky-top shadow navigation">
        <div class="container-fluid px-5 justify-content-between">
            <!-- Left elements -->
            <div class="d-flex">
                <!-- Brand -->
                <a class="navbar-brand me-2 p-0 d-flex align-items-center" href="#">
                    <img src="{{ url('Image/logo/mendoza.png') }}" class="logo" alt="Mendoza Logo" loading="lazy" />
                </a>

                <h4 class="w-auto my-auto d-none d-sm-flex fw-bold text-color"><strong
                        class="text-danger">E</strong>.<strong
                        class="me-1 text-danger">A</strong><strong>Mendoza</strong>
                </h4>
                {{-- <!-- Search form -->
                <form class="input-group w-auto my-auto d-none d-sm-flex">
                    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
                        style="min-width: 125px;" />
                    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search icon"></i></span>
                </form> --}}
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <ul class="navbar-nav flex-row d-none d-md-flex">
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link fw-semibold {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        Home
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link fw-semibold {{ Request::is('doctor&staff') ? 'active' : '' }}"
                        href="/doctor&staff">
                        Doctor & Staff
                    </a>
                </li>

                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link fw-semibold " data-bs-toggle="dropdown" role="button" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-hidden"
                        aria-labelledby="navbarDropdownMenuLink">
                        <div class="row">
                            <div class="col-6">
                                <div class="dropdown-item">Sample</div>
                                <div class="dropdown-item">Sample</div>
                            </div>

                        </div>
                    </ul>
                </li>


                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link fw-semibold {{ Request::is('appointment') ? 'active' : '' }}"
                        href="/appointment">
                        About
                    </a>
                </li>
            </ul>
            <!-- Center elements -->

            <!-- Right elements -->
            <ul class="navbar-nav flex-row">
                {{-- Notification
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fas fa-bell fa-lg icon"></i>
                        <span class="badge rounded-pill badge-notification bg-danger"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-hidden"
                        aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ route('events') }}">Events</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item dropdown mt-2 me-3 me-lg-1">
                    <a href="{{ route('login') }}"
                        class="d-flex justify-content-center align-items-center text-decoration-none text me-3 fw-bold ">
                        <i class="fa-regular fa-circle-user fa-lg me-1 fw-bold "></i>
                        Login
                    </a>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a href="{{ route('register') }}">
                        <button class="btn px-3 rounded-3 fw-semibold btn-button">Sign Up</button>
                    </a>
                </li>

            </ul>
            <!-- Right elements -->
        </div>
    </nav>

    <!-- Content -->
    <section>
        <div class="container">
            {{-- <img src="{{ url() }}" alt=""> --}}
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center align-items-center ">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Navbar -->
    {{-- <div class="container mt-2">
            <div class="row">
                <div class="col-5 d-flex align-items-center">
                    <img src="{{ 'Image/logo/mendoza.png' }}" alt="Logo" class="img">
                    <h3 class="mt-2 ms-2 me-2 fw-semibold">E.A MENDOZA</h3>
                </div>
                <div class="col-7">
                    <div class="d-flex justify-content-end align-items-center">
                        <img src="{{ 'Image/Facebook/fb.png' }}" class="ms-3" alt="fb logo" height="25">
                        <p class="d-inline mt-3 fw-semibold">Facebook</p>
                        <img src="{{ 'Image/Instagram/insta.png' }}" class="ms-3" alt="instagram logo" height="25">
                        <p class="d-inline mt-3 fw-semibold">Instagram</p>
                        <img src="{{ 'Image/Service/service.png' }}" class="ms-3" alt="service logo" height="25">
                        <p class="d-inline mt-3 fw-semibold">Service Offer</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-7 mt-4">
                    <h4 class="fw-semibold">Welcome to </h4>
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="mb-2 bg-danger line1"></div>
                            <div class="mb-2 bg-warning ms-2 line2"></div>
                            <div class="mb-2 bg-info ms-2 line3"></div>
                        </div>
                    </div>
                    <h1 class="fw-bolder">E.A MENDOZA</h1>
                    <h1 class="fw-bolder text-primary d-inline">Appointment <h1 class="d-inline fw-bolder">Management
                        </h1>
                    </h1>
                    <h1 class="fw-bolder">System</h1>
                    <div class="row mt-4">
                        <div class="d-flex">
                            <img src="{{ 'Image/Location/locate.png' }}" alt="location" height="25">
                            <h6 class="mt-1">Magsaysay St, Aparri, Cagayan</h6>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-5">
                            <h6 class="nurturing"><strong class="text-danger">•</strong> Nurturing Health</h6>
                            <h6 class="ms-5 nurturing">Fostering Trust</h6>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <p><strong class="text-danger">EMERGENCY NUMBER</strong></p>
                            <img src="{{ 'Image/Call/call.png' }}" class="call-img" alt="Ambulance">
                            <p class="d-inline mt-2 text-danger fw-semibold ">09123456789</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="d-flex justify-content-end">
                        <img src="{{ 'Image/Background/appoint.png' }}" class="position-absolute appoint1"
                            alt="Background" height="200">
                        <div class="text-center mt-5 border1">
                            <div class="col-12 mt-5">
                                <h5 class="fw-semibold text-light mt-2">Login or Register</h5>
                                <figcaption class="blockquote-footer mt-3 text-light nurturing">
                                    Get access to WEBSITE TITLE
                                </figcaption>
                                <p class="mt-2 text-light"></p>
                                @if (Route::has('login'))
                                    <livewire:welcome.navigation />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}




    <!--- Bootstrap --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
