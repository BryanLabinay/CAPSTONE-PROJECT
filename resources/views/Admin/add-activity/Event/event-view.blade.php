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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>{{ $eventShow->title }} Event
    </h5>
    <hr class="mt-0 text-secondary">
@stop


@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-start">
                <a href="{{ url('Add-Activity/Event') }}" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left me-1"></i>Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <div class="bg-secondary p-1 bg-opacity-25 rounded-1" style="width: 650px;">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <div class="d-inline">
                                <a href="{{ route('edit.event', ['id' => $eventShow->id]) }}"
                                    class="btn btn-outline-primary btn-sm"><i
                                        class="fa-solid fa-pen-to-square fa-lg"></i></a>

                                <form action="{{ route('delete.event', ['id' => $eventShow->id]) }}" method="post"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"> <i
                                            class="fa-solid fa-trash fa-lg"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 ">
                    <div class="row">
                        <div class="col-4">
                            <div class="me-3">
                                <img src="{{ asset('uploads/events/' . $eventShow->img) }}"
                                    class="border border-1 border-secondary m-2 ms-2 rounded-1" height="200"
                                    width="200" alt="{{ $eventShow->title }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-7 ms-2 mt-3 text-black">
                            <h4>{{ $eventShow->title }}</h4>
                            <p><small><i class="fa-solid fa-caret-right me-2"></i></small>{{ $eventShow->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5 p-0">
                <div class="bg-secondary bg-opacity-25 p-0 rounded-1 text-black">
                    <h5 class="text-center">Event List</h5>
                </div>
                @forelse ($events as $data)
                    <div class="clickable-container position-relative mb-1">
                        <a href="{{ route('edit.event', ['id' => $data->id]) }}"
                            class="stretched-link text-decoration-none">
                            <div class="d-flex align-items-center bg-secondary bg-opacity-25 rounded-1 px-3">
                                <div class="me-3">
                                    <img src="{{ asset('uploads/events/' . $data->img) }}"
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
                        <div class="col-5">
                            <div class="bg-secondary bg-opacity-25 rounded-1 shadow-sm">
                                <h5 class="text-center text-black">No Event</h5>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
