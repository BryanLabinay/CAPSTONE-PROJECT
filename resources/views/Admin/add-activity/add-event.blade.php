@extends('adminlte::page')

@section('title', 'Add Event')

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
@stop

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 p-3 text-light rounded-4" style="background-color: #2C4E80;">
                <h4 class="">Event Form</h4>
                <form method="post" action="{{ route('store.event') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="1"
                            style="height: auto; overflow-y: hidden;" required></textarea>
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label for="file">Upload File:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img" name="img" required>
                            <label class="custom-file-label" for="img">Choose file</label>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
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

            // Adjust the height of the textarea based on its content
            function adjustTextareaHeight() {
                descriptionTextarea.style.height = 'auto';
                descriptionTextarea.style.height = descriptionTextarea.scrollHeight + 'px';
            }

            // Listen for input events and adjust the height accordingly
            descriptionTextarea.addEventListener('input', function() {
                adjustTextareaHeight();
            });

            // Adjust the height initially
            adjustTextareaHeight();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
@stop
