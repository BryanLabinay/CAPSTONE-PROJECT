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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Patients Record</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-end">
                <div class="dropdown me-1">
                    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="true">
                        <i class="fa-solid fa-file-export me-1"></i> Export PDF
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('patients.record.pdf') }}" method="GET">
                                <div class="form-group px-2">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                                </div>
                                <div class="form-group px-2">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                                </div>
                                <div class="form-group px-2 py-2">
                                    <input type="submit" value="Export PDF" class="btn btn-danger w-100">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <form action="">
                    <button type="submit" class="btn btn-success"> <i class="fa-solid fa-file-arrow-down me-1"></i> Export
                        Excel</button>
                </form>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row mb-2">
            <div class="col-6 d-flex justify-content-start">
                <form method="GET" action="{{ route('patients.filter') }}" class="form-inline mb-2">
                    @csrf
                    <div class="form-group">
                        <label for="filter_date" class="mr-2">Select Date:</label>
                        <input type="date" id="filter_date" name="filter_date" class="form-control border border-1 me-1"
                            onchange="this.form.submit()" required>
                    </div>
                </form>

                <form action="{{ route('patients.today') }}" method="GET" class="form-inline mb-2">
                    <button type="submit" class="btn btn-primary">Today</button>
                </form>
            </div>

            <div class="col-6 d-flex justify-content-end">
                <form action="{{ route('patients.search') }}" method="GET" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control me-2" placeholder="Enter Name"
                            value="{{ request('name') }}">
                    </div>
                    <button type="submit" class="btn btn-primary"><i
                            class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                </form>
            </div>
        </div>
        <div class="row font-web">
            <div class="col bg-primary-subtle p-2 rounded-1" data-aos="fade-up" data-aos-delay="100">
                <table class="table table-striped mb-0 table-bordered">
                    <thead class="table-danger">
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp

                        @if ($patients->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center fw-bold text-dangexr">No data found</td>
                            </tr>
                        @else
                            @foreach ($patients as $patient)
                                <tr class="text-center clickable-row">
                                    <td>{{ $counter++ }}</td>
                                    <td class="fw-bold text-start">{{ $patient->fname }}
                                        @if (!empty($patient->mname))
                                            {{ substr($patient->mname, 0, 1) }}. {{-- First letter of middle name --}}
                                        @endif
                                        {{ $patient->lname }}
                                        @if (!empty($patient->suffix))
                                            {{ $patient->suffix }}
                                        @endif
                                    </td>
                                    <td>{{ $patient->phone }}</td>
                                    <td class="fw-bold">{{ $patient->address }}</td>
                                    <td class="fw-bold">{{ \Carbon\Carbon::parse($patient->date)->format('F j, Y') }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div>
                    {{ $patients->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
