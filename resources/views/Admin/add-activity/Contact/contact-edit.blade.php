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

        .colored-toast.swal2-icon-success {
            background-color: #012970 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #DC3545 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Edit Contact</h5>
    <hr class="mt-0 text-secondary">
    @if (session('update'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Contact Updated'
                });
            });
        </script>
    @endif
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-start">
                <a href="{{ url('Add-Activity/Contact') }}" class="btn btn-sm btn-primary"><i
                        class="fa-solid fa-arrow-left me-1"></i>Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-12 d-flex justify-content-center">
                <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                    <form action="{{ route('contact.update', ['id' => $edit->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <h5 class="fw-semibold text-dark">Contact Form</h5>
                        <hr class="mt-0 text-black">
                        <div class="form-group">
                            <label for="">Contact Number:</label>
                            <input type="tel" class="form-control" id="cpnumber" name="cpnumber"
                                value="{{ old('cpnumber', $edit->cpnumber) }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $edit->email) }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ old('address', $edit->address) }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Open Hour:</label>
                            <input type="text" class="form-control" id="open_hour" name="open_hour"
                                value="{{ old('open_hour', $edit->open_hour) }}" autocomplete="off" required>
                        </div>

                        <div class="d-flex justify-content-start">
                            <button class="btn btn-primary px-5 ">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-5 col-12 p-0">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                    <h5 class="text-center">List</h5>
                </div>
                @forelse ($footer as $data)
                    <div class="clickable-container position-relative mb-1">
                        <a href="{{ route('contact.view', ['id' => $data->id]) }}"
                            class="stretched-link text-decoration-none">
                            <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                {{-- <div class="me-3">
                                    <img src="{{ asset('uploads/service/' . $service->img) }}"
                                        class="border border-1 border-secondary object-fit" height="50" width="50"
                                        alt="{{ $service->service }}" style="border-radius:50%; object-fit: cover;">
                                </div> --}}
                                <div class="list-group">
                                    <div class="p-2">
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6 class="mb-0 text-dark fw-bold">{{ $data->open_hour }}</h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0 text-muted">
                                                        {{ strlen($data->email) > 40 ? substr($data->email, 0, 40) . '...' : $data->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5 col-12">
                            <div class="bg-secondary bg-opacity-25 rounded-1 shadow-sm">
                                <h5 class="text-center text-black">No Service</h5>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    {{-- TextArea --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const descriptionTextarea = document.getElementById('description');

            function adjustTextareaHeight() {
                descriptionTextarea.style.height = 'auto';
                descriptionTextarea.style.height = descriptionTextarea.scrollHeight + 'px';
            }

            descriptionTextarea.addEventListener('input', function() {
                adjustTextareaHeight();
            });

            adjustTextareaHeight();
        });
    </script>
@stop
