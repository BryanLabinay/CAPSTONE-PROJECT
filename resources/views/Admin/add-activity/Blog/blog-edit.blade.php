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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Edit {{ $blog->title }} Blog
    </h5>
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
                    title: 'Blog Updated'
                });
            });
        </script>
    @endif
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-start">
                <a href="{{ url('Add-Activity/Blog') }}" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left me-1"></i>Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-12 mb-2 d-flex justify-content-center">
                <div class="bg-secondary p-3 text-black px-3 rounded-1 bg-opacity-25" style="width: 650px;">
                    <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">Edit<span
                            class="text-danger"> Blog</span></h5>
                    <form action="{{ route('update.blog', ['id' => $blog->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <h5 class="fw-semibold text-dark">Blog Form</h5> --}}
                        <hr class="mt-0 text-black">
                        <div class="form-group">
                            <label for="">Blog:</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $blog->title) }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="1" required
                                style="height: auto; overflow-y: hidden;">{{ old('description', $blog->description) }} </textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                                <div class="col-md-4 col-12">
                                    @if ($blog->img)
                                        <img src="{{ asset('uploads/blogs/' . $blog->img) }}" height="100"
                                            class="rounded-1">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start">
                            <button class="btn btn-primary px-5 ">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-5 col-12 p-0">
                <div class="bg-secondary bg-opacity-25 p-3 rounded-1 position-relative d-flex flex-column"
                    style="height: 460px">
                    <h5 class="mb-3 fw-bold bg-white px-1 py-1 rounded-1 text-center text-primary">
                        Blog <span class="text-danger">List</span>
                    </h5>
                    <hr class="mt-0 text-black">
                    @forelse ($blogs as $data)
                        <div class="clickable-container position-relative mb-1">
                            <a href="{{ route('edit.blog', ['id' => $data->id]) }}"
                                class="stretched-link text-decoration-none">
                                <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                    <div class="me-3">
                                        <img src="{{ asset('uploads/blogs/' . $data->img) }}"
                                            class="border border-1 border-secondary object-fit" height="50"
                                            width="50" alt="{{ $data->title }}"
                                            style="border-radius:50%; object-fit: cover;">
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
                            <div class="col-md-5 col-12">
                                <div class="bg-secondary bg-opacity-25 rounded-1 shadow-sm">
                                    <h5 class="text-center text-black">No Blog</h5>
                                </div>
                            </div>
                        </div>
                    @endforelse

                    <!-- Pagination Links (stick to bottom) -->
                    <div class="mt-auto d-flex justify-content-center">
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
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
    <script src="h
@stop
