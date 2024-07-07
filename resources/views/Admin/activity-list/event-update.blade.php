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
    </style>
@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Edit Event</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 p-3 text-light rounded-4" style="background-color: #2C4E80;">
                <h4 class="">Event Form</h4>
                <form method="post" action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" value="{{ old('title', $event->title) }}" id="title"
                            name="title" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" style="height: auto; overflow-y: hidden;" required>{{ old('description', $event->description) }}</textarea>
                    </div>

                    <!-- Current Image Preview -->
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="current-img">Current Image:</label>
                                <div>
                                    <img src="{{ asset('uploads/' . $event->img) }}" alt="Current Image" class="rounded-4"
                                        style="max-width: 200px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <!-- File Upload -->
                            <div class="form-group mt-3">
                                <label for="img">Upload File:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-center mt-2">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary me-3">Update Event</button>
                                <button class="btn btn-danger"><a href="{{ route('event-list') }}"
                                        class="text-decoration-none text-white">Cancel</a></button>
                            </div>
                        </div>
                    </div>
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
    {{-- Image --}}
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            bsCustomFileInput.init();
        });
    </script>
    {{-- Text-Area --}}
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
