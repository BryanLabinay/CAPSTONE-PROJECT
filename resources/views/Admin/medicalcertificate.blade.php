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

        .body-img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 90%;
            opacity: 0.1;
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
            <div class="col-12 border rounded-1 shadow-sm bg-secondary bg-opacity-25" style="width:70vw;">
                {{-- rounded-2 bg-secondary bg-opacity-25 shadow-sm --}}
                <div class="p-3 text-dark">
                    {{-- <img src="Image/logo/mendoza.png" class="body-img "> --}}
                    <h5 class="">Input Patient</h5>
                    <hr class="mt-0">
                    <form method="post" action="{{ route('medical-certificate-pdf') }}" enctype="multipart/form-data"
                        target="_blank">
                        @csrf
                        <!-- Patient Name Input with Suggestions -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group position-relative">
                                    <label for="patient_name">Patient Name:</label>
                                    <input type="text" class="form-control" id="patient_name" name="patient_name"
                                        placeholder="Enter the Patient Name..." autocomplete="off">

                                    <!-- Spinner for loading -->
                                    <div id="loading-spinner" class="spinner-border text-primary position-absolute"
                                        style="top: 35%; left: 10%; display: none;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>

                                    <!-- Suggestions container -->
                                    <div id="suggestions-container" class="list-group position-absolute w-100"
                                        style="z-index: 1000;"></div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Patient Address..." autocomplete="off">
                                    <datalist id="addressList"></datalist> <!-- Suggestions will appear here -->
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
                        <hr class="mt-0">
                        <div class="row">
                            <h6 class="fw-semibold">ASSESSMENT:</h6>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <!-- Vital Signs -->
                                <div class="form-group">
                                    <label for="bp">Remark/Diagnosis:</label>
                                    <select name="remarks" id="remarks" class="form-select"
                                        aria-label="Default select example" required>
                                        <option selected disabled hidden>Select Class...</option>
                                        <option value="FIT TO WORK CLASS A">FIT TO WORK CLASS A</option>
                                        <option value="FIT TO WORK CLASS B">FIT TO WORK CLASS B</option>
                                        <option value="FIT TO WORK CLASS C">FIT TO WORK CLASS C</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 ms-3">
                                <p><i class="fa-solid fa-caret-right me-1"></i>CLASS A: Physically fit for all types of
                                    work. No physical defects or disease noted.</p>
                                <p><i class="fa-solid fa-caret-right me-1"></i>CLASS B: Physically fit for all types of
                                    work. Has minor defect/ailment.</p>
                                <p><i class="fa-solid fa-caret-right me-1"></i>CLASS C: Employee but owning to certain
                                    impairments or conditions. Recommending follow
                                    up/evaluation.</p>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="row">
                            <h6 class="fw-semibold">DOCTOR INFORMATION:</h6>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="doctorName">Doctor Name:</label>
                                <select name="doctorName" id="doctor" class="form-control" required>
                                    <option selected disabled hidden>Select a Doctor</option>
                                    @forelse ($doctor as $data)
                                        {{-- <option value="" aria-placeholder="select doctor" disabled></option> --}}
                                        <option
                                            value="{{ $data->fname }} {{ $data->mname }} {{ $data->lname }} {{ $data->suffix }}"
                                            data-position="{{ $data->position }}" data-district="{{ $data->district }}">
                                            {{ $data->id }} {{ $data->fname }} {{ $data->mname }}
                                            {{ $data->lname }} {{ $data->suffix }}
                                        </option>
                                    @empty
                                        <option disabled>No Doctor</option>
                                    @endforelse
                                </select>

                                <div class="row mt-2 mb-2">
                                    <div class="col-6">
                                        <label for="position">Position:</label>
                                        <input type="text" class="form-control" name="position" id="position"
                                            required readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="district">District:</label>
                                        <input type="text" class="form-control" name="district" id="district"
                                            required readonly>
                                    </div>
                                </div>




                            </div>
                        </div>

                        <script>
                            document.querySelector('select[name="doctorName"]').addEventListener('change', function() {
                                const selectedOption = this.options[this.selectedIndex];
                                const position = selectedOption.getAttribute('data-position');
                                const district = selectedOption.getAttribute('data-district');

                                // Update the position and district inputs
                                document.querySelector('input[name="position"]').value = position;
                                document.querySelector('input[name="district"]').value = district;
                            });
                        </script>






                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2 px-4">Create</button>
                            {{-- <button class="btn btn-danger">Send to Patient</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#patient_name').on('input', function() {
                var query = $(this).val();

                if (query.length > 0) {
                    // Show loading spinner
                    $('#loading-spinner').show();
                    $('#suggestions-container').empty();

                    $.ajax({
                        url: '{{ route('fetch.patient.names') }}',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            // Hide loading spinner
                            $('#loading-spinner').hide();

                            // Clear the suggestions container
                            $('#suggestions-container').empty();

                            // Append new suggestions with highlighting
                            if (data.length > 0) {
                                data.forEach(function(patient) {
                                    var highlightedName = patient.fullName.replace(
                                        new RegExp(query, 'gi'), match =>
                                        `<strong>${match}</strong>`);
                                    $('#suggestions-container').append(
                                        '<a href="#" class="list-group-item list-group-item-action suggestion-item" data-address="' +
                                        patient.address + '">' + highlightedName +
                                        '</a>');
                                });
                            } else {
                                $('#suggestions-container').append(
                                    '<div class="list-group-item disabled">No matches found</div>'
                                );
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    // Clear suggestions if input is empty
                    $('#loading-spinner').hide();
                    $('#suggestions-container').empty();
                }
            });

            // Handle click on suggestion item
            $(document).on('click', '.suggestion-item', function(e) {
                e.preventDefault();
                var patientName = $(this).text();
                var address = $(this).data('address'); // Get the address from data attribute

                $('#patient_name').val(patientName);
                $('#address').val(address); // Fill the address input
                $('#suggestions-container').empty(); // Clear suggestions
            });
        });
    </script>


@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

@stop
