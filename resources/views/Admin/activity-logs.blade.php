@extends('adminlte::page')

@section('title', 'DR.MENDOZA MULTI-SPECIALIST CLINIC')

@section('css')
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/custom-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

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
    </style>

@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Activity Log</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="bg-primary-subtle p-2 text-black rounded-1 shadow-lg">
            <table id="myTable" class="table table-light table-bordered table-striped">
                <thead class="table-danger">
                    <tr>
                        {{-- <th>No.</th> --}}
                        <th>User</th>
                        <th>Subject Type</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($logs as $log)
                        @php
                            $desc = '';
                            $subjectType = $log->subject_type;
                            $description = $log->description;

                            if (isset($activity_types[$subjectType])) {
                                $module = $activity_types[$subjectType];
                                if ($module == 'User Module' && $description == 'created') {
                                    $desc = 'New User Registered';
                                } elseif ($module == 'User Module' && $description == 'updated') {
                                    $desc = 'User updated his/her information';
                                } elseif ($module == 'Appointment Module' && $description == 'created') {
                                    $desc = 'Create an Appointment';
                                } elseif ($module == 'Appointment Module' && $description == 'updated') {
                                    $desc = 'Updated an Appointment';
                                } elseif ($module == 'Appointment Module' && $description == 'deleted') {
                                    $desc = 'Appointment Deleted';
                                } elseif ($module == 'Event Module' && $description == 'created') {
                                    $desc = 'New Event Created';
                                } elseif ($module == 'Event Module' && $description == 'updated') {
                                    $desc = 'Updated Event';
                                } elseif ($module == 'Event Module' && $description == 'deleted') {
                                    $desc = 'Event Deleted';
                                } elseif ($description == 'logged in') {
                                    $desc = 'User ' . optional($log->causer)->fname . ' Logged in';
                                } elseif ($description == 'logged out') {
                                    $desc = 'User ' . optional($log->causer)->fname . ' Logged out';
                                }
                            }
                        @endphp
                        <tr>
                            {{-- <td>{{ $counter++ }}</td> --}}
                            <td>{{ optional($log->causer)->fname }} {{ optional($log->causer)->mname }}
                                {{ optional($log->causer)->lname }} {{ optional($log->causer)->suffix }}</td>
                            <td>{{ $activity_types[$log->subject_type] }}</td>
                            <td>{{ $desc }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('F d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Activity</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('js')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
                lengthMenu: "Display _MENU_ Records per page",
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
@stop
