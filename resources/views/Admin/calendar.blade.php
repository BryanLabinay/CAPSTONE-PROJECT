@extends('adminlte::page')

@section('title', 'DR.MENDOZA MULTI-SPECIALIST CLINIC')

@section('css')
    <link rel="icon" type="image/png" href="{{ asset('Image/logo/mendoza.png') }}">
    <link rel="stylesheet" href="{{ url('vendor/adminlte/dist/css/custom-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }

        .calendar {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343984;
            color: white;
            border-radius: 8px 8px 0 0;
        }

        #monthYear {
            font-size: 1.25rem;
            font-weight: 700;
            color: #DC3545;
            background: #ffffff;
            padding: 0px 8px 0px 8px;
            border-radius: 5px
                /* font-family: 'Poppins'; */
        }

        .table-bordered th,
        .table-bordered td {
            border-color: #ddd;
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .calendar-date-link {
            display: block;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .calendar-date-link:hover {
            background-color: #f0f0f0;
        }

        .bg-secondary {
            background-color: #343984 !important;
            color: #f0f0f0
        }

        .modal-title {
            color: #343984;
        }

        .modal-body table {
            margin-bottom: 0;
        }

        .btn-primary {
            background-color: #343984;
            border-color: #343984;
        }

        .btn-primary:hover {
            background-color: #2c3176;
            border-color: #2c3176;
        }

        @media (max-width: 768px) {
            .calendar-date-link {
                padding: 5px;
                font-size: 0.9rem;
            }

            #monthYear {
                font-size: 1rem;
            }

            .btn {
                padding: 5px 10px;
            }
        }
    </style>
@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Calendar</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <form method="GET" action="{{ route('calendar') }}" class="d-flex">
                            <input type="hidden" name="month" value="{{ $currentMonth }}">
                            <input type="hidden" name="year" value="{{ $currentYear }}">
                            <button type="submit" class="btn btn-sm btn-primary me-2" name="prevMonth"><i
                                    class="fa-solid fa-chevron-left"></i></button>
                        </form>
                        <span id="monthYear">{{ date('F Y', mktime(0, 0, 0, $currentMonth + 1, 1, $currentYear)) }}</span>
                        <form method="GET" action="{{ route('calendar') }}" class="d-flex">
                            <input type="hidden" name="month" value="{{ $currentMonth + 2 }}">
                            <input type="hidden" name="year" value="{{ $currentYear }}">
                            <button type="submit" class="btn btn-sm btn-primary ms-2" name="nextMonth"><i
                                    class="fa-solid fa-chevron-right"></i></button>
                        </form>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SUN</th>
                                    <th>MON</th>
                                    <th>TUE</th>
                                    <th>WED</th>
                                    <th>THU</th>
                                    <th>FRI</th>
                                    <th>SAT</th>
                                </tr>
                            </thead>
                            <tbody id="calendarBody">
                                @php
                                    $firstDay = (new DateTime(
                                        $currentYear . '-' . ($currentMonth + 1) . '-01',
                                    ))->format('w');
                                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth + 1, $currentYear);
                                    $date = 1;
                                    $today = date('Y-m-d'); // Get today's date
                                @endphp
                                @for ($i = 0; $i < 6; $i++)
                                    <tr>
                                        @for ($j = 0; $j < 7; $j++)
                                            @if ($i === 0 && $j < $firstDay)
                                                <td></td>
                                            @elseif ($date > $daysInMonth)
                                            @break

                                        @else
                                            @php
                                                $currentDate =
                                                    $currentYear .
                                                    '-' .
                                                    str_pad($currentMonth + 1, 2, '0', STR_PAD_LEFT) .
                                                    '-' .
                                                    str_pad($date, 2, '0', STR_PAD_LEFT);
                                                $appointmentCount = $appointmentCounts->get($currentDate, 0);
                                            @endphp
                                            <td style="position: relative;">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#appointmentModal" data-date="{{ $currentDate }}"
                                                    class="calendar-date-link text-decoration-none fw-bold text-black {{ $currentDate == $today ? 'bg-secondary text-light' : '' }}">
                                                    {{ $date }}
                                                </a>
                                                <div
                                                    style="position: absolute; top: 0px; right: 25px; width: 20px; height: 20px; border-radius: 50%; background-color: red; opacity: {{ $appointmentCount == 0 ? 0 : 1 }}; display: flex; align-items: center; justify-content: center; color: white; font-size: 12px;">
                                                    {{ $appointmentCount }}
                                                </div>
                                            </td>
                                            @php $date++; @endphp
                                        @endif
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for displaying appointment details -->
<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentModalLabel">Appointments on <span id="modalDate"
                        class="fw-bold text-danger">{{ $selectedDate }}</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Appointment Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentDetails">
                        @foreach ($appointments as $appointment)
                            @if ($appointment->date === $selectedDate)
                                <tr>
                                    <td class="fw-bold text-start">{{ $appointment->fname }}
                                        @if (!empty($appointment->mname))
                                            {{ substr($appointment->mname, 0, 1) }}. {{-- Display the first letter of the middle name with a dot --}}
                                        @endif
                                        {{ $appointment->lname }}
                                        @if (!empty($appointment->suffix))
                                            {{ $appointment->suffix }}
                                        @endif

                                    </td>
                                    <td>{{ $appointment->address }}</td>
                                    <td>{{ $appointment->appointment }}</td>
                                    <td>{{ $appointment->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const appointmentModal = new bootstrap.Modal(document.getElementById('appointmentModal'));
        const appointmentModalTitle = document.getElementById('modalDate');
        const appointmentDetails = document.getElementById('appointmentDetails');

        document.querySelectorAll('.calendar-date-link').forEach(anchor => {
            anchor.addEventListener('click', function() {
                const date = this.getAttribute('data-date');
                // Format the date to Month Day, Year
                const formattedDate = new Date(date).toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });
                appointmentModalTitle.textContent = formattedDate;

                // Update modal body with appointments
                const appointments = @json($appointments);
                let appointmentsHTML = '';

                appointments.forEach(appointment => {
                    if (appointment.date === date) {
                        appointmentsHTML += `
                            <tr>
                                <td>${appointment.name}</td>
                                <td>${appointment.address}</td>
                                <td>${appointment.appointment}</td>
                                <td>${appointment.status}</td>
                            </tr>
                        `;
                    }
                });

                appointmentDetails.innerHTML = appointmentsHTML;
            });
        });
    });
</script>
@stop
