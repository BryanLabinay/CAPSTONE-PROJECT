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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Add Employee</h5>
    <hr class="mt-0 text-secondary">

    @if (session('success'))
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
                    title: 'Employee Added'
                });
            });
        </script>
    @endif
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                    <form action="{{ route('upload-doctor') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5 class="fw-semibold text-dark">Add Employee Form</h5>
                        <hr class="mt-0 text-black">
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input name="name" type="text" required class="form-control"
                                placeholder="Enter the name here...">
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <div class="input-group">
                                <select name="position" class="form-select" id="position" required>
                                    <option selected disabled hidden></option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="" required class="form-control">
                        </div>
                        <button class="btn btn-primary px-5">Upload</button>
                    </form>
                </div>
            </div>
            <div class="col-5 p-0">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                    <h5 class="text-center">Employee List</h5>
                </div>
                @foreach ($employees as $employee)
                    <div class="clickable-container position-relative mb-1">
                        <span href="#" class="stretched-link" data-bs-toggle="modal"
                            data-bs-target="#infoModal{{ $employee->id }} ">
                            <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                <div class="me-3">
                                    <img src="{{ asset('Doctors/' . $employee->image) }}"
                                        class="border border-1 border-secondary" height="50" width="50"
                                        alt="{{ $employee->name }}" style="border-radius:50%;">
                                </div>
                                <div class="list-group">
                                    <div class="p-2">
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6 class="mb-0 text-dark fw-bold">{{ $employee->name }}</h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0 text-muted">{{ $employee->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Repeat the above block for more notifications -->
                                </div>
                            </div>
                        </span>
                    </div>


                    {{--  @foreach ($employees as $employee)  --}}
                    <!-- Modal Trigger -->

                    <!-- Modal Structure -->
                    <div class="modal fade" id="infoModal{{ $employee->id }}" tabindex="-1"
                        aria-labelledby="infoModalLabel{{ $employee->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel{{ $employee->id }}">Profile Information</h5>
                                    <div class="d-flex align-items-center ms-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="" method="post" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <!-- Image inside the modal -->
                                        <img src="{{ asset('Doctors/' . $employee->image) }}"
                                            class="img-fluid rounded-circle mb-3" alt="{{ $employee->name }}"
                                            style="width: 150px; height: 150px; border: 2px solid #6c757d;">
                                        <h6 class="text-dark fw-bold">{{ $employee->name }}</h6>
                                        <p class="text-muted">{{ $employee->position }}</p>
                                        <!-- Add more details about the employee if needed -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  @empty
                    <div class="col-5">
                        <div class="bg-secondary bg-opacity-25 rounded-1 shadow-sm">
                            <h5 class="text-center">No Employee</h5>
                        </div>
                    </div>
                @endforelse  --}}
                @endforeach



            </div>
        </div>
    </div>
@stop



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop
