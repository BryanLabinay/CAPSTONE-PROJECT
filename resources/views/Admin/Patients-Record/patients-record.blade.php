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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Patients Record</h5>
    <hr class="mt-0 text-secondary">
    @if (session('success'))
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
                timerPr0ogressBar: true,
            });
            (async () => {
                await Toast.fire({
                    icon: 'success',
                    title: 'Email sent successfully!'
                })
            })()
        </script>
    @endif

    @if (session('error'))
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
                timerPr0ogressBar: true,
            });
            (async () => {
                await Toast.fire({
                    icon: 'warning',
                    title: 'Failed to send email!'
                })
            })()
        </script>
    @endif
@stop

@section('content')
    <div class="container-fluid">

        {{-- @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif --}}

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
        {{-- <div class="row mb-2">
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
        </div> --}}
        <div class="row font-web">
            <div class="col bg-primary-subtle p-2 rounded-1" data-aos="fade-up" data-aos-delay="100">
                <table class="table table-striped mb-0 table-bordered" id="myTable">
                    <thead class="table-danger">
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            {{-- <th scope="col">Address</th> --}}
                            <th scope="col">Appointment</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
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
                                    <td class="text-center">{{ $counter++ }}</td>
                                    <td class="fw-bold text-start">{{ $patient->fname }}
                                        @if (!empty($patient->mname))
                                            {{ substr($patient->mname, 0, 1) }}. {{-- First letter of middle name --}}
                                        @endif
                                        {{ $patient->lname }}
                                        @if (!empty($patient->suffix))
                                            {{ $patient->suffix }}
                                        @endif
                                    </td>
                                    <td>{{ $patient->email }}</td>
                                    {{-- <td class="fw-bold">{{ $patient->address }}</td> --}}
                                    <td class="fw-bold">{{ $patient->appointment }}</td>
                                    <td class="fw-bold">{{ \Carbon\Carbon::parse($patient->date)->format('F j, Y') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-link p-0" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $patient->id }}">
                                            <i class="fa-solid fa-location-arrow fs-5 text-primary"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                {{-- <div>
                    {{ $patients->links('pagination::bootstrap-5') }}
                </div> --}}

            </div>
        </div>
    </div>

    @foreach ($patients as $patient)
        <div class="modal fade" id="modal-{{ $patient->id }}" tabindex="-1"
            aria-labelledby="modalLabel-{{ $patient->id }}" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg rounded">
                    <!-- Modal Header -->
                    <div class="modal-header bg-gradient-primary text-white p-2">
                        <h5 class="modal-title" id="modalLabel-{{ $patient->id }}">Send Email to Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p class="fw-bold mb-3">Name: {{ $patient->fname }} {{ $patient->mname }} {{ $patient->lname }}
                            {{ $patient->suffix }}</p>
                        <form action="{{ route('patient-email') }}" method="POST">
                            @csrf
                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email:</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $patient->email }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="send" class="form-label fw-semibold">Message:</label>
                                <textarea name="send" id="send" class="form-control" cols="30" rows="5"
                                    placeholder="Enter your message here"></textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2">Send</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
