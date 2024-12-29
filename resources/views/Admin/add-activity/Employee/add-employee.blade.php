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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Add Doctor</h5>
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
            <div class="col-md-7 col-12 mb-2 d-flex justify-content-center">
                <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                    <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Service
                        <span class="text-danger">List</span>
                    </h5>
                    <form action="{{ route('upload-doctor') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <h5 class="fw-semibold text-dark">Form</h5> --}}
                        <hr class="mt-0 text-black">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">First Name:</label>
                                    <input name="fname" type="text" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">Middle Name:</label>
                                    <input name="mname" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">Last Name:</label>
                                    <input name="lname" type="text" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">Suffix:</label>
                                    <input name="suffix" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="position">Position:</label>
                                    <input type="text" class="form-control" name="position" id="position" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">District:</label>
                                    <input name="district" type="text" id="district" required class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <button class="btn btn-primary px-5">Upload</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-12 p-0">
                <div class="bg-secondary bg-opacity-25 p-2 rounded-1 position-relative d-flex flex-column"
                    style="height: 460px">
                    <div class="p-0 rounded-1 text-black">
                        <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">
                            Doctor <span class="text-danger">List</span>
                        </h5>
                    </div>
                    <hr class="mt-0 text-black">

                    @foreach ($employees as $data)
                        <div class="clickable-container position-relative mb-1">
                            <span href="#" class="stretched-link" data-bs-toggle="modal"
                                data-bs-target="#infoModal{{ $data->id }}">
                                <div class="d-flex align-items-center bg-white rounded-1 px-3">
                                    <div class="me-3">
                                        @if ($data->image)
                                            <img src="{{ asset('Doctors/' . $data->image) }}"
                                                class="border border-1 border-secondary" height="50" width="50"
                                                alt="{{ $data->fname }}" style="border-radius:50%; object-fit:cover;">
                                        @else
                                            <img src="{{ asset('default.jpg') }}" class="border border-1 border-secondary"
                                                height="50" width="50" alt="Default Image"
                                                style="border-radius:50%; object-fit:cover;">
                                        @endif
                                    </div>
                                    <div class="list-group">
                                        <div class="p-2">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="mb-0 text-dark fw-bold">
                                                            {{ $data->fname }}
                                                            @if ($data->mname)
                                                                {{ Str::substr($data->mname, 0, 1) }}.
                                                            @endif
                                                            {{ $data->lname }} {{ $data->suffix }}
                                                        </h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="mb-0 text-muted">{{ $data->position }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>

                        {{-- Modal for Doctor Info --}}
                        <div class="modal fade" id="infoModal{{ $data->id }}" tabindex="-1"
                            aria-labelledby="infoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="infoModalLabel">Doctor Information</h5>
                                        <div class="d-flex align-items-center ms-3">
                                            <a href="{{ route('edit.info', $data->id) }}"
                                                class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $data->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            @if ($data->image)
                                                <img src="{{ asset('Doctors/' . $data->image) }}"
                                                    class="img-fluid rounded-circle mb-3" alt="{{ $data->fname }}"
                                                    style="width: 150px; height: 150px; border: 2px solid #6c757d; object-fit:cover;">
                                            @else
                                                <img src="{{ asset('default.jpg') }}"
                                                    class="img-fluid rounded-circle mb-3" alt="Default Image"
                                                    style="width: 150px; height: 150px; border: 2px solid #6c757d;">
                                            @endif
                                            <h6 class="text-dark fw-bold">{{ $data->fname }}
                                                {{ $data->mname }}{{ $data->lname }} {{ $data->suffix }}</h6>
                                            <p class="text-muted mb-0">{{ $data->position }}</p>
                                            <p class="text-muted mt-0">{{ $data->district }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Delete Confirmation Modal --}}
                        <div class="modal fade" id="confirmDeleteModal{{ $data->id }}" tabindex="-1"
                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('info.destroy', $data->id) }}" method="post"
                                            class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination Links -->
                    <div class="mt-auto d-flex justify-content-center">
                        {{ $employees->links('pagination::bootstrap-5') }}
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
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop
