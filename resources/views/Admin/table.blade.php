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

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }
    </style>
@stop

@section('content_header')
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Sample Data</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="p-2 bg-primary bg-opacity-25 rounded-2  ">
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
                                    $desc = 'User ' . optional($log->causer)->fname . ' Logged in';
                                } elseif ($description == 'logged out') {
                                    $desc = 'User ' . optional($log->causer)->fname . ' Logged out';
                                }
                            }
                        @endphp

                        <tr class="text-center">
                            <td>{{ $counter++ }}</td>
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
            {{ $logs->links('pagination::bootstrap-5') }}
        </div>


        <table id="myTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>320800</td>
                </tr>
                <tr>
                    <td>Garrett</td>
                    <td>Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>170750</td>
                </tr>
                <tr>
                    <td>Ashton</td>
                    <td>Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>86000</td>
                </tr>
                <tr>
                    <td>Cedric</td>
                    <td>Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>433060</td>
                </tr>
                <tr>
                    <td>Airi</td>
                    <td>Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>162700</td>
                </tr>
                <tr>
                    <td>Brielle</td>
                    <td>Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>372000</td>
                </tr>
                <tr>
                    <td>Herrod</td>
                    <td>Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>137500</td>
                </tr>
                <tr>
                    <td>Rhona</td>
                    <td>Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>327900</td>
                </tr>
                <tr>
                    <td>Colleen</td>
                    <td>Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>205500</td>
                </tr>
                <tr>
                    <td>Sonya</td>
                    <td>Frost</td>
                    <td>Software Engineer</td>
                    <td>Edinburgh</td>
                    <td>103600</td>
                </tr>
                <tr>
                    <td>Jena</td>
                    <td>Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>90560</td>
                </tr>
                <tr>
                    <td>Quinn</td>
                    <td>Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>342000</td>
                </tr>
                <tr>
                    <td>Charde</td>
                    <td>Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>470600</td>
                </tr>
                <tr>
                    <td>Haley</td>
                    <td>Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>313500</td>
                </tr>
                <tr>
                    <td>Tatyana</td>
                    <td>Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>385750</td>
                </tr>
                <tr>
                    <td>Michael</td>
                    <td>Silva</td>
                    <td>Marketing Designer</td>
                    <td>London</td>
                    <td>198500</td>
                </tr>
                <tr>
                    <td>Paul</td>
                    <td>Byrd</td>
                    <td>Chief Financial Officer (CFO)</td>
                    <td>New York</td>
                    <td>725000</td>
                </tr>
                <tr>
                    <td>Gloria</td>
                    <td>Little</td>
                    <td>Systems Administrator</td>
                    <td>New York</td>
                    <td>237500</td>
                </tr>
                <tr>
                    <td>Bradley</td>
                    <td>Greer</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>132000</td>
                </tr>
                <tr>
                    <td>Dai</td>
                    <td>Rios</td>
                    <td>Personnel Lead</td>
                    <td>Edinburgh</td>
                    <td>217500</td>
                </tr>
                <tr>
                    <td>Jenette</td>
                    <td>Caldwell</td>
                    <td>Development Lead</td>
                    <td>New York</td>
                    <td>345000</td>
                </tr>
                <tr>
                    <td>Yuri</td>
                    <td>Berry</td>
                    <td>Chief Marketing Officer (CMO)</td>
                    <td>New York</td>
                    <td>675000</td>
                </tr>
                <tr>
                    <td>Caesar</td>
                    <td>Vance</td>
                    <td>Pre-Sales Support</td>
                    <td>New York</td>
                    <td>106450</td>
                </tr>
                <tr>
                    <td>Doris</td>
                    <td>Wilder</td>
                    <td>Sales Assistant</td>
                    <td>Sydney</td>
                    <td>85600</td>
                </tr>
                <tr>
                    <td>Angelica</td>
                    <td>Ramos</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>London</td>
                    <td>1200000</td>
                </tr>
                <tr>
                    <td>Gavin</td>
                    <td>Joyce</td>
                    <td>Developer</td>
                    <td>Edinburgh</td>
                    <td>92575</td>
                </tr>
                <tr>
                    <td>Jennifer</td>
                    <td>Chang</td>
                    <td>Regional Director</td>
                    <td>Singapore</td>
                    <td>357650</td>
                </tr>
                <tr>
                    <td>Brenden</td>
                    <td>Wagner</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>206850</td>
                </tr>
                <tr>
                    <td>Fiona</td>
                    <td>Green</td>
                    <td>Chief Operating Officer (COO)</td>
                    <td>San Francisco</td>
                    <td>850000</td>
                </tr>
                <tr>
                    <td>Shou</td>
                    <td>Itou</td>
                    <td>Regional Marketing</td>
                    <td>Tokyo</td>
                    <td>163000</td>
                </tr>
                <tr>
                    <td>Michelle</td>
                    <td>House</td>
                    <td>Integration Specialist</td>
                    <td>Sydney</td>
                    <td>95400</td>
                </tr>
                <tr>
                    <td>Suki</td>
                    <td>Burks</td>
                    <td>Developer</td>
                    <td>London</td>
                    <td>114500</td>
                </tr>
                <tr>
                    <td>Prescott</td>
                    <td>Bartlett</td>
                    <td>Technical Author</td>
                    <td>London</td>
                    <td>145000</td>
                </tr>
                <tr>
                    <td>Gavin</td>
                    <td>Cortez</td>
                    <td>Team Leader</td>
                    <td>San Francisco</td>
                    <td>235500</td>
                </tr>
                <tr>
                    <td>Martena</td>
                    <td>Mccray</td>
                    <td>Post-Sales support</td>
                    <td>Edinburgh</td>
                    <td>324050</td>
                </tr>
                <tr>
                    <td>Unity</td>
                    <td>Butler</td>
                    <td>Marketing Designer</td>
                    <td>San Francisco</td>
                    <td>85675</td>
                </tr>
                <tr>
                    <td>Howard</td>
                    <td>Hatfield</td>
                    <td>Office Manager</td>
                    <td>San Francisco</td>
                    <td>164500</td>
                </tr>
                <tr>
                    <td>Hope</td>
                    <td>Fuentes</td>
                    <td>Secretary</td>
                    <td>San Francisco</td>
                    <td>109850</td>
                </tr>
                <tr>
                    <td>Vivian</td>
                    <td>Harrell</td>
                    <td>Financial Controller</td>
                    <td>San Francisco</td>
                    <td>452500</td>
                </tr>
                <tr>
                    <td>Timothy</td>
                    <td>Mooney</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>136200</td>
                </tr>
                <tr>
                    <td>Jackson</td>
                    <td>Bradshaw</td>
                    <td>Director</td>
                    <td>New York</td>
                    <td>645750</td>
                </tr>
                <tr>
                    <td>Olivia</td>
                    <td>Liang</td>
                    <td>Support Engineer</td>
                    <td>Singapore</td>
                    <td>234500</td>
                </tr>
                <tr>
                    <td>Bruno</td>
                    <td>Nash</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>163500</td>
                </tr>
                <tr>
                    <td>Sakura</td>
                    <td>Yamamoto</td>
                    <td>Support Engineer</td>
                    <td>Tokyo</td>
                    <td>139575</td>
                </tr>
                <tr>
                    <td>Thor</td>
                    <td>Walton</td>
                    <td>Developer</td>
                    <td>New York</td>
                    <td>98540</td>
                </tr>
                <tr>
                    <td>Finn</td>
                    <td>Camacho</td>
                    <td>Support Engineer</td>
                    <td>San Francisco</td>
                    <td>87500</td>
                </tr>
                <tr>
                    <td>Serge</td>
                    <td>Baldwin</td>
                    <td>Data Coordinator</td>
                    <td>Singapore</td>
                    <td>138575</td>
                </tr>
                <tr>
                    <td>Zenaida</td>
                    <td>Frank</td>
                    <td>Software Engineer</td>
                    <td>New York</td>
                    <td>125250</td>
                </tr>
                <tr>
                    <td>Zorita</td>
                    <td>Serrano</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>115000</td>
                </tr>
                <tr>
                    <td>Jennifer</td>
                    <td>Acosta</td>
                    <td>Junior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>75650</td>
                </tr>
                <tr>
                    <td>Cara</td>
                    <td>Stevens</td>
                    <td>Sales Assistant</td>
                    <td>New York</td>
                    <td>145600</td>
                </tr>
                <tr>
                    <td>Hermione</td>
                    <td>Butler</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>356250</td>
                </tr>
                <tr>
                    <td>Lael</td>
                    <td>Greer</td>
                    <td>Systems Administrator</td>
                    <td>London</td>
                    <td>103500</td>
                </tr>
                <tr>
                    <td>Jonas</td>
                    <td>Alexander</td>
                    <td>Developer</td>
                    <td>San Francisco</td>
                    <td>86500</td>
                </tr>
                <tr>
                    <td>Shad</td>
                    <td>Decker</td>
                    <td>Regional Director</td>
                    <td>Edinburgh</td>
                    <td>183000</td>
                </tr>
                <tr>
                    <td>Michael</td>
                    <td>Bruce</td>
                    <td>Javascript Developer</td>
                    <td>Singapore</td>
                    <td>183000</td>
                </tr>
                <tr>
                    <td>Donna</td>
                    <td>Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>112000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@stop


@section('js')
    <!-- DataTables JS -->

@stop
