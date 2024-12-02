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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Edit Information</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                    <form action="{{ route('info.update', ['id' => $employee->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h5 class="fw-semibold text-dark">Form</h5>
                        <hr class="mt-0 text-black">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">First Name:</label>
                                    <input name="fname" type="text" required class="form-control"
                                        value="{{ old('fname', $employee->fname) }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Middle Name:</label>
                                    <input name="mname" type="text" class="form-control"
                                        value="{{ old('mname', $employee->mname) }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Last Name:</label>
                                    <input name="lname" type="text" required class="form-control"
                                        value="{{ old('lname', $employee->lname) }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Suffix:</label>
                                    <input name="suffix" type="text" class="form-control"
                                        value="{{ old('suffix', $employee->suffix) }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="position">Position:</label>
                                    <input type="text" class="form-control" name="position" id="position"
                                        value="{{ old('position', $employee->position) }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">District:</label>
                                    <input name="district" type="text" id="district"
                                        value="{{ old('district', $employee->district) }}" autocomplete="off" required
                                        class="form-control">
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
            <div class="col-5 p-0">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                    <h5 class="text-center">Doctor & Staff List</h5>
                </div>
                @foreach ($employees as $data)
                    <div class="clickable-container position-relative mb-1">
                        <span href="#" class="stretched-link" data-bs-toggle="modal"
                            data-bs-target="#infoModal{{ $data->id }} ">
                            <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
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
                                                        {{ $data->lname }}
                                                        {{ $data->suffix }}
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0 text-muted">{{ $data->position }}</p>
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
                        aria-labelledby="infoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel">Doctor Information</h5>
                                    <div class="d-flex align-items-center ms-3">
                                        <a href="{{ route('edit.info', ['id' => $employee->id]) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
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
                                        @if ($employee->image)
                                            <img src="{{ asset('Doctors/' . $employee->image) }}"
                                                class="img-fluid rounded-circle mb-3" alt="{{ $employee->fname }}"
                                                style="width: 150px; height: 150px; border: 2px solid #6c757d; object-fit:cover;">
                                        @else
                                            <img src="{{ asset('default.jpg') }}" class="img-fluid rounded-circle mb-3"
                                                alt="Default Image"
                                                style="width: 150px; height: 150px; border: 2px solid #6c757d;">
                                        @endif

                                        <h6 class="text-dark fw-bold">{{ $employee->fname }}
                                            {{ $employee->mname }}{{ $employee->lname }} {{ $employee->suffix }}</h6>
                                        <p class="text-muted mb-0">{{ $employee->position }}</p>
                                        <p class="text-muted mt-0">{{ $employee->district }}</p>
                                        <!-- Add more details about the employee if needed -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
