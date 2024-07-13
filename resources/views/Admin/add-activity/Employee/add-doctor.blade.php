@extends('adminlte::page')

@section('title', 'DR.MENDOZA MULTI-SPECIALIST CLINIC')

@section('css')
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">

    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/custom-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Add Doctor</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <div class="bg-secondary p-2 text-black px-3 rounded-2 bg-opacity-50" style="width: 600px;">
                    <form action="" method="get">
                        <h4 class="fw-semibold text-dark">Add Doctor Form</h4>
                        <hr class="mt-0 text-black">
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter the name here...">
                        </div>
                        <div class="form-group">
                            <label for="">Skills:</label>
                            <input type="text" class="form-control" placeholder="Enter the Skills here...">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="" id="" class="form-control">
                        </div>
                        <button class="btn btn-primary px-5">Upload</button>
                    </form>
                </div>
            </div>
            <div class="col-5">
                <div class="d-flex align-items-center bg-secondary bg-opacity-50 rounded-2 p-0 px-3">
                    <div class="me-3">
                        <img src="{{ asset('Image/Staff/img1.jpg') }}" class="border border-1 border-secondary"
                            height="50" width="50" alt="Doctor Profile" style="border-radius:50%;">
                    </div>
                    <div class="flex-grow-1 p-0">
                        <div class="d-flex align-items-center mt-3 p-0">
                            <h6 class="m-0 fw-semibold">Bryan</h6>
                        </div>
                        <p class="text-muted">Doctor</p>
                    </div>
                    <div class="d-flex align-items-center ms-3">
                        <a href="" class="btn btn-sm btn-outline-primary me-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="" method="post" class="m-0">
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- <script>
            console.log("Hi, Welcome to E.A MENDOZA APPOINTMENT SYSTEM!");
        </script> --}}
@stop
