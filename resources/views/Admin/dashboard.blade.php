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
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Dashboard</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{--  <img src="{{ url('Image/logo/mendoza.png') }}" class="body-img ">  --}}

        <div class="row">
            <div class="col-md-3 col-12">
                <!-- small box -->
                <a href="{{ route('all-appointment') }}" class="text-decoration-none">
                    <div class="small-box" style="background-color:#343984; height:110px;"> <!-- Adjust height as needed -->
                        <div class="inner p-2 text-white">
                            <h3>{{ $countall }}</h3>
                            <p>All Appointments</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- ./col -->
            <div class="col-md-3 col-12">
                <!-- small box -->
                <a href="{{ route('pending.appointment') }}" class="text-decoration-none">
                    <div class="small-box bg-secondary" style="height: 110px;">
                        <div class="inner p-2">
                            <h3>{{ $countpending }}</h3>
                            {{-- <sup style="font-size: 20px">%</sup> --}}
                            <p>Pending Appointment</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-md-3 col-12">
                <!-- small box -->
                <a href="{{ route('approved.appointment') }}" class="text-decoration-none">
                    <div class="small-box bg-success" style="height: 110px;">
                        <div class="inner p-2">
                            <h3>{{ $countapproved }}</h3>
                            <p>Approved Appointment</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-md-3 col-12">
                <!-- small box -->
                <a href="{{ route('cancelled.appointment') }}" class="text-decoration-none">
                    <div class="small-box bg-danger" style="height: 110px">
                        <div class="inner p-2">
                            <h3>{{ $countresched }}</h3>

                            <p>Follow-Up Appointment</p>
                        </div>
                    </div>
                </a>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


            {{--  chart  --}}
            <div class="row mt-4">
                <div class="col-12 col-lg-6 d-flex">
                    <div class="card w-100 d-flex">
                        <div class="card-body d-flex flex-column">
                            <h6 class="text-center">Appointments for <span id="currentYear">{{ $year }}</span></h6>
                            <div class="d-flex justify-content-center">
                                <button id="prevYear" class="btn btn-primary p-0 me-2">Previous Year</button>
                                <button id="nextYear" class="btn btn-primary p-0">Next Year</button>
                            </div>
                            <canvas id="monthlyAppointmentsChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex">
                    <div class="card w-100 d-flex">
                        <div class="card-body d-flex flex-column">
                            <!-- First Bar Chart: Appointments by Type -->
                            <div class="mt-5">
                                <canvas id="appointmentsChart" width="1000"></canvas>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                const ctx1 = document.getElementById('appointmentsChart').getContext('2d');
                const appointmentsData1 = @json($appointments);

                const labels1 = appointmentsData1.map(appointment => appointment.appointment);
                const data1 = appointmentsData1.map(appointment => appointment.total);

                new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: labels1,
                        datasets: [{
                            label: 'Number of Appointments',
                            data: data1,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 159, 64, 0.6)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'right',
                                align: 'start',
                                labels: {
                                    generateLabels: (chart) => {
                                        const dataset = chart.data.datasets[0];
                                        return chart.data.labels.map((label, i) => ({
                                            text: `${label} (${dataset.data[i]})`,
                                            fillStyle: dataset.backgroundColor[i],
                                            strokeStyle: dataset.borderColor[i],
                                            lineWidth: 1,
                                        }));
                                    },
                                    font: {
                                        size: 14
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.raw;
                                        return label;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'Appointments by Type',
                                font: {
                                    size: 20, // Set the font size of the title (e.g., 20px)
                                    weight: 'bold', // Optional: Make the title bold
                                    family: 'Arial, sans-serif', // Optional: Specify the font family
                                    color: 'black'
                                },
                                padding: {
                                    top: 10, // Add space above the title
                                    bottom: 20 // Add space below the title
                                }
                            }

                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>



            <script>
                let currentYear = {{ $year }};
                const baseUrl = "{{ route('admin.dash') }}";

                const ctx2 = document.getElementById('monthlyAppointmentsChart').getContext('2d');
                const appointmentsData2 = @json($appointmentsData);

                const labels2 = [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December'
                ];

                const data2 = appointmentsData2.map(item => item.total);

                const chart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: labels2,
                        datasets: [{
                            label: 'Appointments Per Month',
                            data: data2,
                            backgroundColor: 'rgba(0, 0, 128, 1)',
                            borderColor: 'rgba(13, 110, 253, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'right',
                                align: 'start',
                                labels: {
                                    generateLabels: function(chart) {
                                        const dataset = chart.data.datasets[0];
                                        return chart.data.labels.map((label, index) => {
                                            return {
                                                text: `${label}: ${dataset.data[index]}`,
                                                fillStyle: dataset.backgroundColor,
                                                hidden: false,
                                                lineCap: 'butt',
                                                lineDash: [],
                                                lineDashOffset: 0,
                                                lineJoin: 'miter',
                                                strokeStyle: dataset.borderColor,
                                                pointStyle: 'rect',
                                                datasetIndex: 0
                                            };
                                        });
                                    },
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: `Monthly Appointments for ${currentYear}`
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Total Appointments'
                                }
                            }
                        }
                    }
                });

                // Year navigation buttons
                document.getElementById('prevYear').addEventListener('click', function() {
                    currentYear--;
                    navigateYear();
                });

                document.getElementById('nextYear').addEventListener('click', function() {
                    currentYear++;
                    navigateYear();
                });

                function navigateYear() {
                    window.location.href = `${baseUrl}?year=${currentYear}`;
                }
            </script>

            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>


@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- <script>
            console.log("Hi, Welcome to E.A MENDOZA APPOINTMENT SYSTEM!");
        </script> --}}
@stop
