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

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Data Table --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js">

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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Set-Appointment</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row font-web">
            <div class="col bg-primary-subtle p-2 rounded-1" data-aos="fade-up" data-aos-delay="100">
                <div class="table-responsive">
                    <table class="table table-striped mb-0 table-bordered" id="myTable">
                        <thead class="table-danger">
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="d-none d-sm-table-cell">Email</th>
                                <!-- Hidden on small screens -->
                                <th scope="col">Appointment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th> <!-- Hidden on small screens -->
                                <th scope="col">Action</th>
                                <!-- Hidden on small screens -->
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1; @endphp

                            @if ($patients->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center fw-bold text-danger">No data found</td>
                                </tr>
                            @else
                                @foreach ($patients as $patient)
                                    <tr class="text-center clickable-row">
                                        <td class="text-center">{{ $counter++ }}</td>
                                        <td class="fw-bold text-start">{{ $patient->fname }}
                                            @if (!empty($patient->mname))
                                                {{ substr($patient->mname, 0, 1) }}.
                                            @endif
                                            {{ $patient->lname }}
                                            @if (!empty($patient->suffix))
                                                {{ $patient->suffix }}
                                            @endif
                                        </td>
                                        <td class="d-none d-sm-table-cell">{{ $patient->email }}</td>
                                        <!-- Hidden on small screens -->
                                        <td class="fw-bold">{{ $patient->appointment }}</td>
                                        <td class="fw-bold text-center"
                                            style="color:
                                        @if ($patient->status === 'Approved') green
                                        @elseif ($patient->status === 'Rescheduled') navy
                                        @elseif ($patient->status === 'Closed') blue
                                        @else gray @endif">
                                            @if ($patient->status == 'Rescheduled')
                                                Follow-Up
                                            @elseif ($patient->status == 'Closed')
                                                Done
                                            @else
                                                {{ $patient->status }}
                                            @endif
                                        </td>
                                        <td class="fw-bold">
                                            {{ \Carbon\Carbon::parse($patient->date)->format('F j, Y') }}</td>
                                        <!-- Hidden on small screens -->
                                        <td class="text-center p-0">
                                            <button type="button" class="btn btn-sm btn-primary mt-1"
                                                data-bs-toggle="modal" data-bs-target="#modal-{{ $patient->id }}">
                                                Follow-Up
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->

    @foreach ($patients as $patient)
        <tr class="text-center clickable-row">
            <!-- Table Row -->
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $patient->id }}" tabindex="-1"
            aria-labelledby="modalLabel-{{ $patient->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-navy p-2">
                        <h5 class="modal-title" id="modalLabel-{{ $patient->id }}">{{ $patient->fname }}
                            {{ $patient->mname }} {{ $patient->lname }} {{ $patient->suffix }}</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('appointments.reschedule', $patient->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $patient->fname }} {{ $patient->mname }} {{ $patient->lname }} {{ $patient->suffix }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $patient->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="message-{{ $patient->id }}" class="form-label">Message</label>
                                <textarea class="form-control" name="message" id="message-{{ $patient->id }}" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Follow-Up Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1">Follow-Up</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">Close</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    @endforeach

@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        new DataTable('#myTable', {
            layout: {
                topStart: {
                    pageLength: {
                        menu: [10, 25, 50, 100]
                    }
                },
                topEnd: {
                    search: {
                        placeholder: 'Type search here'
                    }
                },
                bottomEnd: {
                    paging: {
                        buttons: 3
                    }
                }
            },
            language: {
                lengthMenu: " _MENU_ Records per page",
                info: "Showing _START_ to _END_ of _TOTAL_ records",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)",
                search: "Search:",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/5c14b0052b.js" crossorigin="anonymous"></script>
@stop
