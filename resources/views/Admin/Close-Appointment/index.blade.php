@extends('adminlte::page')

@section('title', 'DR.MENDOZA MULTI-SPECIALIST CLINIC')
@section('css')
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Close Appointment</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row font-web">
            <div class="col bg-primary-subtle p-2 rounded-1" data-aos="fade-up" data-aos-delay="100">
                <div class="table-responsive">
                    <table class="table table-striped mb-0 table-bordered" id="myTable">
                        <thead class="table-danger">
                            <tr class="">
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="d-none d-sm-table-cell">Email</th>
                                <!-- Hidden on small screens -->
                                <th scope="col">Appointment</th>
                                <th scope="col">Date</th> <!-- Hidden on small screens -->
                                <th scope="col">Action</th>
                                <!-- Hidden on small screens -->
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $orderedClose = $close->sortBy(function ($data) {
                                    return $data->status === 'Approved' ? 0 : 1;
                                });
                            @endphp

                            @php $counter = 1; @endphp

                            @foreach ($orderedClose as $data)
                                <tr class="">
                                    <td class="text-center">{{ $counter++ }}</td>
                                    <td class="fw-bold">{{ $data->fname }} {{ $data->mname }} {{ $data->lname }}
                                        {{ $data->suffix }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td class="fw-bold text-center"
                                        style="color:
                            @if ($data->status === 'Approved') green
                            @elseif ($data->status === 'Rescheduled') navy
                            @else gray @endif">
                                        @if ($data->status == 'Rescheduled')
                                            Follow-Up
                                        @else
                                            {{ $data->status }}
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($data->date)->format('F j, Y') }}</td>
                                    <td class="text-center p-0">
                                        @if ($data->status !== 'Closed')
                                            <form action="{{ route('appointments.close', $data->id) }}" method="POST"
                                                class="close-form" data-id="{{ $data->id }}">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm close-btn mt-1">Close</button>
                                            </form>
                                        @else
                                            <span class="badge bg-secondary">Closed</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Form for submitting the request -->
                            <form id="close-form" action="" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all Close buttons
            const closeButtons = document.querySelectorAll('.close-btn');

            closeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent form submission

                    // Get the form to submit
                    const form = this.closest('form');

                    // SweetAlert confirmation
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, close it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form if confirmed
                            form.submit();
                        }
                    });
                });
            });
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
