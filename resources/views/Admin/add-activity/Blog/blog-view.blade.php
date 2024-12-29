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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>{{ $blogView->title }} Blog
    </h5>
    <hr class="mt-0 text-secondary">
@stop


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-12 mb-2 d-flex justify-content-center">
                <div class="bg-secondary p-1 bg-opacity-25 rounded-1" style="width: 650px;">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start">
                            <a href="{{ url('Add-Activity/Blog') }}" class="btn btn-outline-primary"><i
                                    class="fa-solid fa-arrow-left me-1"></i>Back</a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div class="d-inline">
                                <a href="{{ route('edit.blog', ['id' => $blogView->id]) }}"
                                    class="btn btn-outline-primary btn-sm"><i
                                        class="fa-solid fa-pen-to-square fa-lg"></i></a>

                                <!-- Delete Button to Trigger Modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteBlogModal">
                                    <i class="fa-solid fa-trash fa-lg"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 ">
                    <div class="row">
                        <div class="col-4">
                            <div class="me-3">
                                <img src="{{ asset('uploads/blogs/' . $blogView->img) }}"
                                    class="border border-1 border-secondary m-2 ms-2 rounded-1" height="200"
                                    width="200" alt="{{ $blogView->title }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-7 ms-2 mt-3 text-black">
                            <h4>{{ $blogView->title }}</h4>
                            <p><small><i class="fa-solid fa-caret-right me-2"></i></small>{{ $blogView->description }}
                            </p>
                        </div>
                    </div>
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
                            <a href="{{ route('view.blog', ['id' => $data->id]) }}"
                                class="stretched-link text-decoration-none">
                                <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                    <div class="me-3">
                                        <img src="{{ asset('uploads/blogs/' . $data->img) }}"
                                            class="border border-1 border-secondary" height="50" width="50"
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteBlogModal" tabindex="-1" aria-labelledby="confirmDeleteBlogModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteBlogModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this blog post? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- Form to Submit the Deletion -->
                    <form action="{{ route('delete.blog', ['id' => $blogView->id]) }}" method="post"
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
