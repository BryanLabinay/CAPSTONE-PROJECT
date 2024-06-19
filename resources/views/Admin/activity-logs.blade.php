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
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Subject Type</th>
                    <th>Event</th>
                    <th>Description</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $perPage = $logs->perPage();
                    $currentPage = $logs->currentPage();
                    $counter = ($currentPage - 1) * $perPage + 1;
                @endphp
                @forelse ($logs as $log)
                    {{-- @php
                            $desc = '';
                            if ($activity->log_name == 'user' && $activity->description == 'created') {
                                $desc = 'New user registered';
                            } elseif ($activity->log_name == 'user' && $activity->description == 'updated') {
                                $desc = 'User updated his/her information';
                            } elseif ($activity->log_name == 'event' && $activity->description == 'created') {
                                $desc = 'New project created';
                            } elseif ($activity->log_name == 'appointment' && $activity->description == 'created') {
                                $desc = 'New appointment created';
                            } elseif ($activity->log_name == 'appointment' && $activity->description == 'updated') {
                                $desc = 'Update existing appointment';
                            } elseif ($activity->description == 'logged in') {
                                $desc =
                                    'User ' .
                                    (!empty($activity->causer) ? $activity->causer->name : '') .
                                    ' logged in successfully';
                            }
                        @endphp --}}
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $log->subject_type }}</td>
                        <td>{{ $log->event }}</td>
                        <td>{{ $log->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</td>
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
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        console.log("Hi, Welcome to E.A MENDOZA APPOINTMENT SYSTEM!");
    </script>
@stop
