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
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS  -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
    {{-- Notification --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Cancelled Appointment</h5>
    <hr class="mt-0 text-secondary">
    <div class="d-flex justify-content-end">
        @if (session('delete'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'end',
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
    </div>
@stop

@section('content')
    <div class="row mb-3">
        <div class="col d-flex justify-content-end">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="true">
                    <i class="fa-solid fa-file-export me-1"></i> Export PDF
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('export.cancelledrecord.pdf') }}" method="get" target="_blank">
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

            <form action="{{ route('export.rejected.excel') }}" method="post">
                @csrf
                <button class="btn btn-success">
                    <i class="fa-solid fa-file-arrow-down me-1"></i> Export Excel
                </button>
            </form>
        </div>
    </div>
    <hr class="mt-0 mb-3">
    <div class="row mb-2">
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
    </div>
    <div class="row gy-4 font-web">
        <div class="col bg-primary-subtle p-2 rounded-1" data-aos="fade-up" data-aos-delay="100">
            <table class="table table-striped mb-0 table-bordered">
                <thead class="table-danger">
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Appointment</th>
                        {{-- <th scope="col">Message</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Reason</th>
                        {{-- <th scope="col">Approval</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $perPage = $cancelled->perPage();
                        $currentPage = $cancelled->currentPage();
                        $counter = ($currentPage - 1) * $perPage + 1;
                    @endphp
                    @forelse ($cancelled->sortByDesc('created_at') as $data)
                        <tr class="text-center">

                            <td class="">{{ $counter++ }}</td>
                            <td class="fw-bold text-start">{{ $data->fname }}
                                @if (!empty($data->mname))
                                    {{ substr($data->mname, 0, 1) }}. {{-- Display the first letter of the middle name with a dot --}}
                                @endif
                                {{ $data->lname }}
                                @if (!empty($data->suffix))
                                    {{ $data->suffix }}
                                @endif
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->date)->format('F d, Y') }}</td>
                            <td class="fw-bold">{{ $data->appointment }}</td>
                            {{-- <td>{{ $data->message }}</td> --}}
                            <td class="fw-bold"
                                style="color:
                                @if ($data->status === 'Approved') green
                                @elseif ($data->status === 'Cancelled')
                                    red
                                @else
                                    gray @endif">
                                {{ $data->status }}</td>
                            <td>{{ $data->reason }}</td>
                            {{-- Approval --}}
                            {{-- <td class="py-0">
                                <div class="d-flex justify-content-center align-items-center mt-1">
                                    <form action="/Appointment-List/approvedStatus/{{ $data->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary me-2 py-1 my-0"
                                            @if ($data->status === 'Approved' || $data->status === 'Cancelled') disabled style="opacity: 0.2;" @endif>
                                            Approve
                                        </button>
                                    </form>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#newModal{{ $data->id }}">
                                        <button class="btn btn-danger py-1 my-0"
                                            @if ($data->status === 'Approved' || $data->status === 'Cancelled') disabled style="opacity: 0.1;" @endif>
                                            Reject
                                        </button>
                                    </a>
                                </div>
                            </td> --}}
                            <td>
                                <div class="d-flex justify-content-center align-items-center mt-0">
                                    {{-- View --}}
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $data->id }}">
                                        <i class="fas fa-fw fa-magnifying-glass fs-5 text-success"></i>
                                    </a>

                                    {{-- Delete --}}
                                    {{-- <form action="{{ route('appointment.delete', ['appointment_id' => $data->id]) }}"
                                        method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger p-0">
                                            <i class="fas fa-fw fa-trash fs-5"></i>
                                        </button>
                                    </form> --}}
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="h5 text-center alert alert-primary">
                                    No Cancelled Appointment
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $cancelled->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    {{-- for cancelation --}}



    {{-- Modal --}}
    @foreach ($cancelled as $data)
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
                        @if (!empty($data->message))
                            <p><b>Message:</b> {{ $data->message }}</p>
                        @endif
                        {{-- Reason --}}
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

    @foreach ($cancelled as $data)
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
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach
@stop


@section('js')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/5c14b0052b.js" crossorigin="anonymous"></script>
    <script>
        console.log("Hi, Welcome to E.A MENDOZA APPOINTMENT SYSTEM!");
    </script>
@stop
