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
                <form action="">
                    <button type="submit" class="btn btn-danger me-2"><i class="fa-solid fa-file-pdf me-1"></i>Export
                        PDF</button>
                </form>
                <form action="">
                    <button type="submit" class="btn btn-success"> <i class="fa-solid fa-file-arrow-down me-1"></i> Export
                        Excel</button>
                </form>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-end">
                <form action="" method="GET" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control me-2" placeholder="Enter Patient Name"
                            value="">
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
                            <th scope="col">Total Appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp

                        @foreach ($patients as $patient)
                            <tr class="text-center clickable-row" data-bs-toggle="modal"
                                data-bs-target="#detailsModal{{ $loop->index }}">
                                <td>{{ $counter++ }}</td>
                                <td class="fw-bold text-start">{{ $patient->name }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td class="fw-bold">{{ $patient->address }}</td>
                                <td class="fw-bold">{{ $patient->total }}</td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="detailsModal{{ $loop->index }}" tabindex="-1"
                                aria-labelledby="detailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailsModalLabel">Appointment Details for
                                                <b class="text-primary">{{ $patient->name }}</b>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $patient->name }}</p>
                                            <p><strong>Contact:</strong> {{ $patient->phone }}</p>
                                            <p><strong>Address:</strong> {{ $patient->address }}</p>
                                            <p><strong>Total Appointments:</strong> <b
                                                    class="text-danger">{{ $patient->total }}</b></p>

                                            <h6 class="fw-bold">Types of Appointments:</h6>
                                            <ul class="py-0">
                                                @foreach ($allAppointments->where('name', $patient->name) as $appointment)
                                                    <li class="mt-0 p-0">
                                                        <p><b class="text-danger">{{ $appointment->appointment }}</b>-<b
                                                                class="text-primary">{{ \Carbon\Carbon::parse($appointment->date)->format('F j, Y') }}</b>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
