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
            <div class="row font-web">
                <div class="col-6 bg-primary-subtle rounded-2 me-3">
                    <div class="p-3">
                        <h4 class="mb-3 fw-bold bg-white px-5 py-2 rounded-5 text-center" style="color:#012970;">
                            Appointment
                            Form</h4>
                        <form action="{{ route('Add-Appointment') }}" method="post">
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

                            <div class="form-group mb-2">
                                <label for="fullName" class="fw-semibold mb-1">Full Name</label>
                                <input type="text" class="form-control py-2" name="name" id="fullName" required>
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
                                <select class="form-control py-2" id="dropdown" name="appointment">
                                    <option value="" class="text-muted"">Select Appointment</option>
                                    <option value="Check-Up">X-Ray</option>
                                    <option value="Ultrasound">Labaratory</option>
                                    <option value="Xray">Ultrasound</option>
                                    <option value="2D Echo with Doppler">2D Echo with Doppler</option>
                                    <option value="ECG">ECG</option>
                                    <option value="NST">NST</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Drug Test">Drug Test</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="message" class="fw-semibold mb-1">Additional Message (optional)</label>
                                <textarea class="form-control expanding-textarea" id="message" name="message" rows="1"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-5 py-2 mt-2 fw-semibold ">Request
                                Appointment</button>
                        </form>
                    </div>
                </div>
                <div class="col-5 ms-5 bg-primary-subtle rounded-2">
                    <div class="text-center mt-2">
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
                    const fullNameInput = document.getElementById('fullName');
                    const emailInput = document.getElementById('email');

                    if (option === 'me') {
                        fullNameInput.value = '{{ Auth::user()->name }}'; // Autofill with user's name
                        emailInput.value = '{{ Auth::user()->email }}'; // Autofill with user's email
                        fullNameInput.readOnly = true; // Make full name input read-only (instead of disabled)
                        emailInput.readOnly = true; // Make email input read-only (instead of disabled)
                    } else {
                        fullNameInput.value = ''; // Reset the full name field
                        emailInput.value = ''; // Reset the email field
                        fullNameInput.readOnly = false; // Allow full name input
                        emailInput.readOnly = false; // Allow email input
                    }
                }
            </script>
    </section>
</x-app-layout>
