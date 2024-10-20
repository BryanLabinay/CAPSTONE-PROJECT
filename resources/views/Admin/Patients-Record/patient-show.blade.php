@extends('adminlte::page')

@section('title', 'Admin Dashboard')
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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Example Name</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6 d-flex justify-content-start">
                <a href="{{ url('/Patients-Record/List') }}" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left me-1"></i>Back</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <form action="">
                    <button type="submit" class="btn btn-danger me-2">
                        <i class="fa-solid fa-file-pdf me-1"></i>Medical Certificate
                    </button>
                </form>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <div class="p-2 border rounded-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mt-2 ">{{ $patient->fname }} {{ $patient->mname }} {{ $patient->lname }}
                            {{ $patient->suffix }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Address: {{ $patient->address }}</small>
                        </div>
                        <div class="col-4">
                            <small class="text-muted">Email: {{ $patient->email }}</small>
                        </div>
                        <div class="col-2">
                            <small>Phone: {{ $patient->phone }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Appointment Record --}}
        <div class="row font-web">
            <div class="col bg-secondary-subtle p-2 rounded-1" data-aos="fade-up" data-aos-delay="100">
                <table class="table table-striped mb-0 table-bordered">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Appointment</th>
                            <th scope="col">Date</th>
                            <th scope="col">Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        <tr class="text-center">
                            <td>{{ $counter++ }}</td>
                            <td>{{ $patient->appointment }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->date)->format('F d, Y') }}</td>
                            <td class="fw-bold"
                                style="color:
                                @if ($patient->status === 'Approved') green
                                @elseif ($patient->status === 'Cancelled') red
                                @else gray @endif">
                                {{ $patient->status }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <hr class="mt-0"> --}}
    </div>
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
