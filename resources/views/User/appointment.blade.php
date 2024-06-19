<x-app-layout>
    <section id="team" class="mt-2 team">
        <div class="container" data-aos="fade-up">
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
            <div class="row gy-4 font-web">
                <div class="col-6 bg-primary-subtle rounded-4 me-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-3">
                        <h3 class="mb-3 fw-bold bg-white px-5 py-2 rounded-5" style="color:#012970;">Appointment
                            Form</h3>
                        <form action="{{ route('Add-Appointment') }}" method="post">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="fullName" class="fw-semibold mb-1">Full Name</label>
                                <input type="text" class="form-control py-2" name="name" id="fullName" required>
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
                <div class="col-5 ms-5 bg-primary-subtle rounded-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center mt-2">
                        <h3 class="mb-3 fw-bold bg-white px-5 py-2 rounded-5" style="color:#012970;">Consultation
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

    </section>
</x-app-layout>
