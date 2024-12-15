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
            <div class="col-12 d-flex justify-content-start mb-1">
                <a href="{{ url('Add-Activity/Employee/Doctor') }}" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left me-1"></i>Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <div class="bg-secondary p-2 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                    <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Add
                        <span class="text-danger">Doctor</span>
                    </h5>
                    <form action="{{ route('info.update', ['id' => $employee->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                <div class="bg-secondary bg-opacity-25 p-2 rounded-1 d-flex flex-column" style="height: 460px">
                    <div class="p-0 rounded-1 text-black">
                        <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">
                            Doctor <span class="text-danger">List</span>
                        </h5>
                    </div>
                    <hr class="mt-0 text-black">

                    @foreach ($employees as $data)
                        <div class="clickable-container position-relative mb-1">
                            <a href="{{ route('edit.info', ['id' => $data->id]) }}" class="text-decoration-none">
                                <div class="d-flex align-items-center bg-white rounded-1 px-3">
                                    <div class="me-3">
                                        @if ($data->image)
                                            <img src="{{ asset('Doctors/' . $data->image) }}"
                                                class="border border-1 border-secondary" height="50" width="50"
                                                alt="{{ $data->fname }}" style="border-radius:50%; object-fit:cover;">
                                        @else
                                            <img src="{{ asset('default.jpg') }}"
                                                class="border border-1 border-secondary" height="50" width="50"
                                                alt="Default Image" style="border-radius:50%; object-fit:cover;">
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
                            </a>
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
