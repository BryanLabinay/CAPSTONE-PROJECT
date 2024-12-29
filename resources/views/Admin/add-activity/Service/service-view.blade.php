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
            font-family: "Nunito";
        }
    </style>
@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Service List</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-12 d-flex justify-content-center mb-2">
                <div class="bg-secondary p-1 bg-opacity-25 rounded-1" style="width: 650px;">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start">
                            <a href="{{ url('Add-Activity/Service') }}" class="btn btn-outline-primary"><i
                                    class="fa-solid fa-arrow-left me-1"></i>Back</a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div class="d-inline">
                                <a href="{{ route('service.edit', ['id' => $serviceShow->id]) }}"
                                    class="btn btn-outline-primary btn-sm"><i
                                        class="fa-solid fa-pen-to-square fa-lg"></i></a>

                                <!-- Delete Button to Trigger Modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteServiceModal">
                                    <i class="fa-solid fa-trash fa-lg"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <div class="">
                                @if ($serviceShow->img)
                                    <img src="{{ asset('uploads/service/' . $serviceShow->img) }}"
                                        class="m-2 ms-2 rounded-1" height="150" width="150"
                                        alt="{{ $serviceShow->service }}" style="object-fit: cover;">
                                @else
                                    <img src="{{ asset('uploads/service/default.png') }}" class="m-2 ms-2 rounded-1"
                                        height="150" width="150" alt="Default Image" style="object-fit: cover;">
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ms-2 text-black">
                            <h4 class="text-center fw-bold">{{ $serviceShow->service }}</h4>
                            <p><small><i class="fa-solid fa-caret-right me-2"></i></small>{{ $serviceShow->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-12 p-0">
                <div class="bg-secondary bg-opacity-25 p-2 rounded-1 position-relative" style="height: 460px">
                    <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                        <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Service
                            <span class="text-danger">List</span>
                        </h5>
                    </div>
                    <hr class="mt-0 text-black">

                    <!-- Content -->
                    <div>
                        @forelse ($services as $data)
                            <div class="clickable-container position-relative mb-1">
                                <a href="{{ route('service.view', ['id' => $data->id]) }}"
                                    class="stretched-link text-decoration-none">
                                    <div class="d-flex align-items-center bg-white bg-opacity rounded-1 px-3">
                                        <div class="me-3">
                                            @if ($data->img)
                                                <img src="{{ asset('uploads/service/' . $data->img) }}"
                                                    class="border border-1 border-secondary object-fit" height="50"
                                                    width="50" alt="{{ $data->service }}"
                                                    style="border-radius:50%; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('uploads/service/default.png') }}" height="50"
                                                    width="50" alt="Default Image"
                                                    style="border-radius:50%; object-fit: cover;">
                                            @endif
                                        </div>
                                        <div class="list-group">
                                            <div class="p-2">
                                                <div class="flex-grow-1">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h6 class="mb-0 text-dark fw-bold">{{ $data->service }}</h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="mb-0 text-muted">
                                                                {{ strlen($data->description) > 37 ? substr($data->description, 0, 37) . '...' : $data->description }}
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
                                        <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center"
                                            style="color:#012970;">
                                            <span class="text-danger">No Service</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center align-items-center position-absolute bottom-0 start-0 w-100">
                        {{ $services->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteServiceModal" tabindex="-1" aria-labelledby="confirmDeleteServiceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteServiceModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this service? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('service.delete', ['id' => $serviceShow->id]) }}" method="post"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
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
