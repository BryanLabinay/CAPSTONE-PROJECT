@extends('adminlte::page')

@section('title', 'DR.MENDOZA MULTI-SPECIALIST CLINIC')

@section('css')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/custom-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Add Event</h5>
    <hr class="mt-0 text-secondary">
    @if (session('statusevent'))
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
                    title: 'Event Added'
                });
            });
        </script>
    @endif
    @if (session('eventdelete'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
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
            (async () => {
                await Toast.fire({
                    icon: 'warning',
                    title: 'Event Deleted'
                })
            })();
        </script>
    @endif
    @if (session('messageupdate'))
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
                    title: 'Event Changed'
                });
            });
        </script>
    @endif
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-12 d-flex justify-content-center mb-2">
                <div class="p-3 text-dark rounded-1 bg-secondary bg-opacity-25" style="width: 650px;">
                    <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Add <span
                            class="text-danger">Events</span> & Updates</h5>
                    <hr class="mt-0">
                    <form method="post" action="{{ route('store.event') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Title of events" required>
                        </div>
                        {{-- Date and Time --}}
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title mb-0">Date:</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Time:</label>
                                    <input type="time" class="form-control" id="time" name="time" required>
                                </div>
                            </div>
                        </div>
                        {{-- Location --}}
                        <div class="form-group">
                            <label for="title">Location:</label>
                            <input type="text" class="form-control" id="location" name="location"
                                placeholder="Street/Barangay/Municipal/City">
                        </div>
                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="1"
                                style="height: auto; overflow-y: hidden;" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Activities Inluded:</label>
                            <textarea class="form-control" id="activity" name="activity" rows="1" style="height: auto; overflow-y: hidden;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Who can Attend?:</label>
                            <textarea class="form-control" id="attend" name="attend" rows="1" style="height: auto; overflow-y: hidden;"
                                required></textarea>
                        </div>
                        <!-- File Upload -->
                        <div class="form-group">
                            <label for="file">Upload File:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img" name="img">
                                <label class="custom-file-label" for="img">Choose file</label>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-12 p-0">
                <div class="bg-secondary bg-opacity-25 p-2 rounded-1 position-relative" style="height: 740px">
                    <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                        <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 mt-2 text-center text-primary">Event
                            <span class="text-danger">List</span>
                        </h5>
                    </div>
                    <hr class="mt-0 text-black">

                    <!-- Content -->
                    <div>
                        @forelse ($eventlist as $data)
                            <div class="clickable-container position-relative mb-1">
                                <a href="{{ route('view.event', ['id' => $data->id]) }}"
                                    class="stretched-link text-decoration-none">
                                    <div class="d-flex align-items-center bg-white bg-opacity rounded-1 px-3">
                                        <div class="me-3">
                                            @if ($data->img)
                                                <img src="{{ asset('uploads/events/' . $data->img) }}"
                                                    class="border border-1 border-secondary object-fit" height="50"
                                                    width="50" alt="{{ $data->title }}"
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
                                                            <h6 class="mb-0 text-dark fw-bold">
                                                                {{ strlen($data->title) > 35 ? substr($data->title, 0, 35) . '...' : $data->title }}
                                                            </h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="mb-0 text-muted">
                                                                {{ strlen($data->description) > 35 ? substr($data->description, 0, 35) . '...' : $data->description }}
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
                        {{ $eventlist->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4 p-0 mb-2">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-2 text-black">
                    <h5 class="mb-3 fw-bold bg-white px-1 py-2 rounded-1 text-center" style="color:#012970;"><span
                            class="text-danger">List</span></h5>
                </div>
                @forelse ($eventlist as $data)
                    <div class="clickable-container position-relative mb-1">
                        <a href="{{ route('view.event', ['id' => $data->id]) }}"
                            class="stretched-link text-decoration-none">
                            <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                <div class="me-3">
                                    <img src="{{ asset('uploads/events/' . $data->img) }}"
                                        class="border border-1 border-secondary object-fit" height="50" width="50"
                                        alt="{{ $data->title }}" style="border-radius:50%; object-fit: cover;">
                                </div>
                                <div class="list-group">
                                    <div class="p-2">
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6 class="mb-0 text-dark fw-bold">{{ $data->title }}</h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0 text-muted">
                                                        {{ strlen($data->description) > 40 ? substr($data->description, 0, 40) . '...' : $data->description }}
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
                        <div class="col-5">
                            <div class="bg-secondary bg-opacity-25 rounded-1 shadow-sm">
                                <h5 class="text-center text-black">No Events</h5>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div> --}}
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    {{-- image --}}
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
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
@stop
