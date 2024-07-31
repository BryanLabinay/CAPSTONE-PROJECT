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
    <h5 class="fw-bolder" style="color: #343984;"><i class="fa-solid fa-caret-right me-2"></i>Medical Certificate</h5>
    <hr class="mt-0 text-secondary">
@stop

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-12" style="width:70vw;">
                <div class="p-3 text-dark rounded-2 bg-secondary bg-opacity-25 shadow-sm">
                    <h5 class="">Input Patient</h5>
                    <hr class="mt-0">
                    <form method="post" action="{{ route('medical-certificate-pdf') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Patient Name Input -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Patient Name:</label>
                                    <input type="text" class="form-control" id="title"
                                        placeholder="Enter the Patient Name..." name="title" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Additional Medical Information -->
                                <div class="form-group">
                                    <label for="heart">Address:</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Patient Address...">
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="row mt-2">
                            <h6 class="fw-semibold">PHYSICAL EXAMINATIONS:</h6>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="heart">Heart:</label>
                                    <input type="text" list="heart-options" class="form-control" id="heart"
                                        name="heart" autocomplete="off">
                                    <datalist id="heart-options">
                                        <option value="Normal">
                                        <option value="Murmur">
                                        <option value="Arrhythmia">
                                        <option value="Bradycardia">
                                        <option value="Tachycardia">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lung">Lung:</label>
                                    <input type="text" class="form-control" list="lung-options" id="lung"
                                        name="lung" autocomplete="off">
                                    <datalist id="lung-options">
                                        <option value="lung 1">
                                        <option value="lung 2">
                                        <option value="lung 3">
                                        <option value="lung 4">
                                        <option value="lung 5">
                                    </datalist>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="heent">HEENT:</label>
                                    <input type="text" class="form-control" id="heent" name="heent">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="abdomen">Abdomen:</label>
                                    <input type="text" class="form-control" id="abdomen" name="abdomen">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="extremeties">Extremeties:</label>
                                    <input type="text" class="form-control" id="extremeties" name="extremeties">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="intergumentary">Integumentary:</label>
                                    <input type="text" class="form-control" id="intergumentary"
                                        name="intergumentary">
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="row">
                            <h6 class="fw-semibold">VITAL SIGNS:</h6>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <!-- Vital Signs -->
                                <div class="form-group">
                                    <label for="bp">Blood Pressure (BP):</label>
                                    <input type="text" class="form-control" id="bp" name="bp">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cr">Cardiac Rate (CR):</label>
                                    <input type="text" class="form-control" id="cr" name="cr">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="weight">Weight:</label>
                                    <input type="text" class="form-control" id="weight" name="weight">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="height">Height:</label>
                                    <input type="text" class="form-control" id="height" name="height">
                                </div>
                            </div>



                        </div>


                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2 px-4">Create</button>
                            <button class="btn btn-danger">Send to Patient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

@stop
