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
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS  -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    {{-- Data Table --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js">
    {{-- Notification --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>All Appointments</h5>
    <hr class="mt-0 text-secondary">
    <div class="d-flex justify-content-end">
        @if (session('delete'))
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
                        title: 'Appointment Deleted'
                    })
                })()
            </script>
        @endif
        {{-- Approved Status --}}
        @if (session('statusApproved'))
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
                        title: 'Appointment Approved'
                    })
                })()
            </script>
        @endif
        {{-- Reject Status --}}
        @if (session('statusCancelled'))
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
                        title: 'Appointment Rejected'
                    })
                })()
            </script>
        @endif
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col d-flex justify-content-end">
                <form action="{{ route('export.reports.pdf') }}" method="get" target="_blank">
                    @csrf
                    <button class="btn btn-primary me-1"><i class="fa-solid fa-file-pdf me-1"></i>Make Report</button>
                </form>
                <div class="dropdown me-1">
                    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="true">
                        <i class="fa-solid fa-file-export"></i> Export PDF
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('export.allrecord.pdf') }}" method="get" target="_blank">
                                @csrf

                                <!-- Start Date -->
                                <div class="form-group px-2">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                                </div>

                                <!-- End Date -->
                                <div class="form-group px-2">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group px-2 py-2">
                                    <input type="submit" value="Export PDF" class="btn btn-danger w-100">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <form action="{{ route('export.excel') }}" method="post" target="_blank">
                    @csrf
                    <button class="btn btn-success">
                        <i class="fa-solid fa-file-arrow-down me-1"></i> Export Excel
                    </button>
                </form>
            </div>
        </div>
        <hr class="mt-0 mb-3">
        {{-- <div class="row mb-2">
        <div class="col-6 d-flex justify-content-start">
            <form method="GET" action="{{ route('appointments.filter') }}" class="form-inline mb-2" target="_blank">
                @csrf
                <div class="form-group">
                    <label for="filter_date" class="mr-2">Select Date:</label>
                    <input type="date" id="filter_date" name="filter_date" class="form-control border border-1 me-1"
                        onchange="this.form.submit()" required>
                </div>
            </form>

            <form action="{{ route('appointments.today') }}" method="GET" class="form-inline mb-2">
                <button type="submit" class="btn btn-primary">Today</button>
            </form>
        </div>

        <div class="col-6 d-flex justify-content-end">
            <form action="{{ route('appointments.search') }}" method="GET" class="form-inline">
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
            <div class="col bg-primary-subtle p-2 rounded-1 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                <table class="table table-striped mb-0 table-bordered table-hover" id="myTable">
                    <thead class="table-danger">
                        <tr class="text-start">
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            {{-- <th scope="col">Email</th> --}}
                            <th scope="col">Date</th>
                            <th scope="col">Appointment</th>
                            {{-- <th scope="col">Message</th> --}}
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Reason</th> --}}
                            <th scope="col">Approval</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                        $perPage = $appointments->perPage();
                        $currentPage = $appointments->currentPage();
                        $counter = ($currentPage - 1) * $perPage + 1;
                    @endphp --}}
                        @php $counter = 1; @endphp
                        @forelse ($appointments as $data)
                            <tr class="text-center">
                                <td class="text-center">{{ $counter++ }}</td>
                                <td class="fw-bold text-start" style="max-width: 200px;">
                                    {{ $data->fname }}
                                    @if (!empty($data->mname))
                                        {{ substr($data->mname, 0, 1) }}.
                                    @endif
                                    {{ $data->lname }}
                                    @if (!empty($data->suffix))
                                        {{ $data->suffix }}
                                    @endif
                                </td>


                                {{-- <td>{{ $data->email }}</td> --}}
                                <td>{{ \Carbon\Carbon::parse($data->date)->format('F d, Y') }}</td>
                                <td class="fw-bold">{{ $data->appointment }}</td>
                                <td class="fw-bold"
                                    style="color:
                                @if ($data->status === 'Approved') green
                                @elseif ($data->status === 'Cancelled') red
                                @elseif ($data->status === 'Rescheduled') navy
                                @else gray @endif">

                                    @if ($data->status === 'Rescheduled')
                                        Follow-Up
                                    @else
                                        {{ $data->status }}
                                    @endif
                                </td>
                                {{-- Approval --}}
                                <td class="py-0">
                                    <div class="d-flex justify-content-center align-items-center mt-1">
                                        {{-- Approve --}}
                                        <form action="/Appointment-List/approvedStatus/{{ $data->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary me-2 py-1 my-0"
                                                @if ($data->status === 'Approved' || $data->status === 'Cancelled' || $data->status === 'Rescheduled') disabled style="opacity: 0.3;" @endif>
                                                Approve
                                            </button>
                                        </form>

                                        {{-- Reject --}}
                                        @if ($data->status !== 'Approved' && $data->status !== 'Cancelled' && $data->status !== 'Rescheduled')
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#newModal{{ $data->id }}">
                                                <button class="btn btn-danger py-1 my-0">
                                                    Reject
                                                </button>
                                            </a>
                                        @else
                                            <button class="btn btn-danger py-1 my-0" disabled style="opacity: 0.3;">
                                                Reject
                                            </button>
                                        @endif
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center align-items-center mt-0">
                                        {{-- View --}}
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $data->id }}">
                                            <i class="fas fa-fw fa-magnifying-glass fs-5 text-success me-3"></i>
                                        </a>

                                        {{-- Chat --}}
                                        <a href="{{ route('chat.user', $data->user->id) }}" class=""><i
                                                class="fa-sharp fa-solid fa-comment-dots fs-5"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="h5 text-center alert alert-primary">
                                        No Record
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                {{-- <div>
                {{ $appointments->links('pagination::bootstrap-5') }}
            </div> --}}
            </div>
        </div>
    </div>

    {{-- for cancelation --}}



    {{-- Modal --}}
    @foreach ($appointments as $data)
        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold " id="exampleModalLabel">Appointment
                            Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <!-- Image inside the modal -->
                            @if ($data->image === null)
                                <img src="{{ asset('default.jpg') }}" height="150" width="150"
                                    class="me-1 border border-1 border-secondary" style="border-radius: 50%;"
                                    alt="{{ $data->fname }} Profile">
                            @else
                                <img src="{{ asset('images/' . $data->image) }}" height="150" width="150"
                                    class="me-1 border border-1 border-secondary"
                                    style="border-radius: 50%; object-fit:cover;" alt="{{ $data->fname }} Profile">
                            @endif

                            {{-- <h6 class="text-dark fw-bold">{{ $employee->fname }}
                                {{ $employee->mname }}{{ $employee->lname }} {{ $employee->suffix }}</h6>
                            <p class="text-muted mb-0">{{ $employee->position }}</p>
                            <p class="text-muted mt-0">{{ $employee->district }}</p>
                            <!-- Add more details about the employee if needed --> --}}
                        </div>
                        {{-- Add your appointment details here --}}
                        <p><b>Name:</b> {{ $data->fname }}
                            @if (!empty($data->mname))
                                {{ substr($data->mname, 0, 1) }}. {{-- Display the first letter of the middle name with a dot --}}
                            @endif
                            {{ $data->lname }}
                            @if (!empty($data->suffix))
                                {{ $data->suffix }}
                            @endif
                        </p>
                        <p><b>Address:</b> {{ $data->address }}</p>
                        <p><b>Phone:</b> {{ $data->phone }}</p>
                        <p><b>Date:</b>
                            {{ \Carbon\Carbon::parse($data->date)->format('F d, Y') }}</p>
                        <p><b>Appointment:</b> {{ $data->appointment }}</p>
                        {{-- Show the Message only if it exists --}}
                        @if (!empty($data->message))
                            <p><b>Message:</b> {{ $data->message }}</p>
                        @endif

                        {{-- Show the Reason based on the appointment status --}}
                        @if ($data->status === 'Cancelled')
                            <p><b class="text-danger">Reason:</b> {{ $data->reason }}</p>
                        @elseif($data->status === 'Pending')
                            {{-- Hide the Reason field --}}
                            {{-- No output for Pending --}}
                        @elseif($data->status !== 'Approved')
                            <p><b>Reason:</b> Not applicable</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($appointments as $data)
        <div class="modal fade" id="newModal{{ $data->id }}" tabindex="-1" aria-labelledby="newModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold" id="newModalLabel">Select Reason for Cancellation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Add your content for the new modal here --}}
                        {{-- Cancelation reason dropdown --}}
                        <form action="/Appointment-List/canceledStatus/{{ $data->id }}" method="POST">
                            @csrf
                            <label for="reason">Select Reason for Cancellation:</label><br>
                            <select id="reason" name="reason" class="form-control">
                                <option class="text-muted">Select Reason</option>
                                <option value="The type of service requested is not available">The type of service
                                    requested is not available</option>
                                <option value="Prioritization of emergencies">Prioritization of emergencies</option>
                                <option value="Incorrect client info">Incorrect client info</option>
                                <option value="Schedule conflict">Schedule conflict</option>
                                <option value="Equipment failure">Equipment failure</option>
                                <option value="Holiday closure">Holiday closure</option>
                            </select><br><br>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div> --}}
                </div>
            </div>
        </div>
        </div>
    @endforeach

@stop


@section('js')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <script>
        new DataTable('#myTable', {
            layout: {
                topStart: {
                    pageLength: {
                        menu: [10, 25, 50, 100] // Page length options
                    }
                },
                topEnd: {
                    search: {
                        placeholder: 'Type search here' // Custom search placeholder
                    }
                },
                bottomEnd: {
                    paging: {
                        buttons: 3 // Number of pagination buttons
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
                },
                emptyTable: "No data available in the table" // Customize empty message
            },
            columnDefs: [{
                    orderable: false,
                    targets: [4, 5, 6]
                } // Disable sorting for specific columns
            ],
        });
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/5c14b0052b.js" crossorigin="anonymous"></script>
@stop
