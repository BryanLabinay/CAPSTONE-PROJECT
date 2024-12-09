<x-app-layout>
    <section id="team" class="team">
        <div class="container">
            <header class="section-header">
            </header>
            <div class="d-flex justify-content-end">
                @if (session('status'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 2500,
                            timerPr0ogressBar: true,
                        });
                        (async () => {
                            await Toast.fire({
                                icon: 'success',
                                title: 'Appointment Requested'
                            })
                        })()
                    </script>
                @endif
            </div>
            <div class="row p-2 font-web">
                <div class="col-7 bg-primary-subtle rounded-2">
                    <div class="p-3">
                        <h4 class="mb-3 fw-bold bg-white px-5 py-2 rounded-5 text-center" style="color:#012970;">
                            Appointment
                            Form</h4>
                        <form action="{{ route('Add-Appointment') }}" method="post" id="appointmentForm">
                            @csrf
                            <div class="d-flex">
                                <div class="mb-3 d-inline">
                                    <h5 class="mt-2 me-3">Who's appointment?</h5>
                                </div>
                                <div class="mb-3 d-inline me-2">
                                    <input type="radio" class="btn-check" name="options" id="option1" value="1"
                                        autocomplete="off" onclick="fillDetails('me')">
                                    <label class="btn btn-outline-primary" for="option1">Me</label>
                                </div>
                                <div class="mb-3 d-inline">
                                    <input type="radio" class="btn-check" name="options" id="option2" value="2"
                                        autocomplete="off" checked onclick="fillDetails('others')">
                                    <label class="btn btn-outline-primary" for="option2">Others</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="firstName" class="fw-semibold mb-1">First Name</label>
                                        <input type="text" class="form-control py-2" name="fname" id="firstName"
                                            required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="middleName" class="fw-semibold mb-1">Middle Name</label>
                                        <input type="text" class="form-control py-2" name="mname" id="middleName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="lastName" class="fw-semibold mb-1">Last Name</label>
                                        <input type="text" class="form-control py-2" name="lname" id="lastName"
                                            required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="suffix" class="fw-semibold mb-1">Suffix <small>(e.g., Jr., Sr.,
                                                III)</small></label>
                                        <input type="text" class="form-control py-2" name="suffix" id="suffix">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="email" class="fw-semibold mb-1">Email</label>
                                <input type="email" class="form-control py-2" name="email" id="email" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="fw-semibold mb-1">Address</label>
                                <input type="text" class="form-control py-2" name="address" id="address" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="phone" class="fw-semibold mb-1">Phone Number</label>
                                        <input type="tel" class="form-control py-2" name="phone" id="phone"
                                            required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="date" class="fw-semibold mb-1">Preferred Date</label>
                                        <input type="date" class="form-control py-2" name="date" id="date"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="dropdown" class="fw-semibold mb-1">Choose an option:</label>
                                <select class="form-control py-2" id="dropdown" name="appointment" required>
                                    <option value="" selected disabled hidden>Select Appointment</option>
                                    @forelse ($service as $data)
                                        <option value="{{ $data->service }}">{{ $data->service }}</option>
                                    @empty
                                        <option disabled>No Service</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="message" class="fw-semibold mb-1">Additional Message (optional)</label>
                                <textarea class="form-control expanding-textarea" id="message" name="message" rows="1"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-5 py-2 mt-2 fw-semibold">Request
                                Appointment</button>
                        </form>


                    </div>
                </div>
                <div class="col-5 bg-primary-subtle rounded-2">
                    <div class="text-center mt-3">
                        <h4 class="mb-3 fw-bold bg-white px-5 py-2 rounded-5 text-center" style="color:#012970;">
                            Consultation
                    </div>
                    <div class="row px-4">
                        <div class="col bg-white rounded-3 py-1 px-3">
                            <h4 class="fw-bold">Monday</h4>
                            <p class="fw-semibold"><b>OBGYNE</b> - Dr. Bernadette Soriano <br> <b>Internal Medicine</b>
                                - Dr. Ronera G.
                                Alonzo </p>
                        </div>
                    </div>
                    <div class="row px-4 mt-2">
                        <div class="col bg-white rounded-3 py-1 px-3">
                            <h4 class="fw-bold">Tuesday to Wednesday</h4>
                            <p class="fw-semibold"><b>Family Med.</b> - Dr. Bernadette Soriano</p>
                        </div>
                    </div>
                    <div class="row px-4 mt-2">
                        <div class="col bg-white rounded-3 py-1 px-3">
                            <h4 class="fw-bold">Thursday</h4>
                            <p class="fw-semibold"><b>Internal Medicine</b> - - Dr. Ronera G.
                                Alonzo</p>
                        </div>
                    </div>
                    <div class="row px-4 mt-2">
                        <div class="col bg-white rounded-3 py-1 px-3">
                            <h4 class="fw-bold">Saturday</h4>
                            <p class="fw-semibold"><b>OBGYNE</b> - Dr. Bernadette Soriano</p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function fillDetails(option) {
                    if (option === 'me') {
                        // Auto-fill with user data and make fields readonly
                        document.getElementById('firstName').value = "{{ auth()->user()->fname }}";
                        document.getElementById('middleName').value = "{{ auth()->user()->mname }}";
                        document.getElementById('lastName').value = "{{ auth()->user()->lname }}";
                        document.getElementById('suffix').value =
                            "{{ auth()->user()->suffix ?? '' }}"; // if no suffix, leave it blank
                        document.getElementById('email').value = "{{ auth()->user()->email }}";

                        // Make fields readonly
                        document.getElementById('firstName').readOnly = true;
                        document.getElementById('middleName').readOnly = true;
                        document.getElementById('lastName').readOnly = true;
                        document.getElementById('suffix').readOnly = true;
                        document.getElementById('email').readOnly = true;

                    } else {
                        // Clear the fields for 'Others' and make them editable again
                        document.getElementById('firstName').value = '';
                        document.getElementById('middleName').value = '';
                        document.getElementById('lastName').value = '';
                        document.getElementById('suffix').value = '';
                        document.getElementById('email').value = '';

                        // Make fields editable again
                        document.getElementById('firstName').readOnly = false;
                        document.getElementById('middleName').readOnly = false;
                        document.getElementById('lastName').readOnly = false;
                        document.getElementById('suffix').readOnly = false;
                        document.getElementById('email').readOnly = false;
                    }
                }

                // Make sure readonly fields are submitted
                document.getElementById('appointmentForm').addEventListener('submit', function() {
                    document.getElementById('firstName').removeAttribute('readonly');
                    document.getElementById('middleName').removeAttribute('readonly');
                    document.getElementById('lastName').removeAttribute('readonly');
                    document.getElementById('suffix').removeAttribute('readonly');
                    document.getElementById('email').removeAttribute('readonly');
                });
            </script>


    </section>
</x-app-layout>
