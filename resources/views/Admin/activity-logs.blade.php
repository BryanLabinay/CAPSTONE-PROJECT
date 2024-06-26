@extends('adminlte::page')

@section('title', 'Activity Logs')
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
        <div class="p-3 bg-primary bg-opacity-25 rounded-3">
            <table class="table table-bordered">
                <thead class="table-danger">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>User</th>
                        <th>Subject Type</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $perPage = $logs->perPage();
                        $currentPage = $logs->currentPage();
                        $counter = ($currentPage - 1) * $perPage + 1;
                    @endphp
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
                                    $desc = 'User ' . optional($log->causer)->name . ' Logged in successfully';
                                }
                            }
                        @endphp
                        <tr class="text-center">
                            <td>{{ $counter++ }}</td>
                            <td>{{ optional($log->causer)->name }}</td>
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
            {{ $logs->links('pagination::bootstrap-5') }}
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        console.log("Hi, Welcome to E.A MENDOZA APPOINTMENT SYSTEM!");
    </script>
@stop
