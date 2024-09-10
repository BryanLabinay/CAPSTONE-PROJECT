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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Add Contact</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                    <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5 class="fw-semibold text-dark">Contact Form</h5>
                        <hr class="mt-0 text-black">
                        <div class="form-group">
                            <label for="">Contact Number:</label>
                            <input name="cpnumber" type="text" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" type="email" required class="form-control">
                        </div>
                        <div class="d-flex justify-content-start">
                            <button class="btn btn-primary px-5 ">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5 p-0">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                    <h5 class="text-center">Contact List</h5>
                </div>
                <div class="clickable-container position-relative mb-1">
                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#infoModal"></a>
                    <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                        {{-- <div class="me-3">
                            <img src="{{ asset('assets/img/Staff/cover.jpg') }}" class="border border-1 border-secondary"
                                height="50" width="50" alt="" style="border-radius:50%;">
                        </div> --}}
                        <div class="list-group">
                            <div class="p-2">
                                <div class="flex-grow-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="mb-0 text-dark fw-bold">Consultation</h6>
                                        </div>
                                        <div class="col-12">
                                            <p class="mb-0 text-muted">
                                                Lorem ipsum dolor sit amet.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-5 p-0">
            <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                <h5 class="text-center">Service List</h5>
            </div>
            @forelse ($services as $service)
                <div class="clickable-container position-relative mb-1">
                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#infoModal"></a>
                    <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                        <div class="me-3">
                            <img src="{{ asset('uploads/service/' . $service->img) }}"
                                class="border border-1 border-secondary" height="50" width="50"
                                alt="{{ $service->service }}" style="border-radius:50%;">
                        </div>
                        <div class="list-group">
                            <div class="p-2">
                                <div class="flex-grow-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="mb-0 text-dark fw-bold">{{ $service->service }}</h6>
                                        </div>
                                        <div class="col-12">
                                            <p class="mb-0 text-muted">
                                                {{ strlen($service->description) > 40 ? substr($service->description, 0, 40) . '...' : $service->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row d-flex justify-content-center">
                    <div class="col-5">
                        <div class="bg-secondary bg-opacity-50 rounded-1 shadow-sm">
                            <h5 class="text-center text-black">No Blog</h5>
                        </div>
                    </div>
                </div>
            @endforelse
        </div> --}}
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
