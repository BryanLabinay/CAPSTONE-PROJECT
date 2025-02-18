<x-app-layout>
    <section id="team" class="mt-2 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-danger">Edit Appointment</h2>
            </header>

            <div class="row gy-4 font-web">
                <div class="col-7 bg-primary-subtle rounded-2">
                    <div class="p-3">
                        <h3 class="mb-3 fw-bold bg-white px-5 py-2 rounded-5" style="color:#012970;">
                            Edit Appointment
                        </h3>
                        <form action="{{ route('update.appointment', ['appointment_id' => $appointment->id]) }}"
                            method="post">
                            @csrf
                            @method('PUT')

                            {{-- Display validation errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="fullName" class="fw-semibold mb-1">First Name</label>
                                        <input type="text" class="form-control py-2" name="fname"
                                            value="{{ old('fname', $appointment->fname) }}" placeholder=""
                                            id="fullName" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="fullName" class="fw-semibold mb-1">Middle Name</label>
                                        <input type="text" class="form-control py-2" name="mname"
                                            value="{{ old('mname', $appointment->mname) }}" placeholder=""
                                            id="fullName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="fullName" class="fw-semibold mb-1">Last Name</label>
                                        <input type="text" class="form-control py-2" name="lname"
                                            value="{{ old('lname', $appointment->lname) }}" placeholder=""
                                            id="fullName" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="fullName" class="fw-semibold mb-1">Suffix</label>
                                        <input type="text" class="form-control py-2" name="suffix"
                                            value="{{ old('suffix', $appointment->suffix) }}" placeholder=""
                                            id="fullName" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="address" class="fw-semibold mb-1">Address</label>
                                <input type="text" class="form-control py-2" name="address"
                                    value="{{ old('address', $appointment->address) }}" id="address" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="phone" class="fw-semibold mb-1">Phone Number</label>
                                        <input type="tel" class="form-control py-2" name="phone"
                                            value="{{ old('phone', $appointment->phone) }}" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="date" class="fw-semibold mb-1">Preferred Date</label>
                                        <input type="date" class="form-control py-2" name="date"
                                            value="{{ old('date', $appointment->date) }}" id="date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="dropdown" class="fw-semibold mb-1">Choose an option:</label>
                                <select class="form-control py-2" id="dropdown" name="appointment" required>
                                    <option value="">Select Appointment</option>
                                    <option value="X-Ray"
                                        {{ old('appointment', $appointment->appointment) == 'X-Ray' ? 'selected' : '' }}>
                                        X-Ray
                                    </option>
                                    <option value="Laboratory"
                                        {{ old('appointment', $appointment->appointment) == 'Laboratory' ? 'selected' : '' }}>
                                        Laboratory</option>
                                    <option value="Ultrasound"
                                        {{ old('appointment', $appointment->appointment) == 'Ultrasound' ? 'selected' : '' }}>
                                        Ultrasound</option>
                                    <option value="2D Echo with Doppler"
                                        {{ old('appointment', $appointment->appointment) == '2D Echo with Doppler' ? 'selected' : '' }}>
                                        2D Echo with Doppler</option>
                                    <option value="ECG"
                                        {{ old('appointment', $appointment->appointment) == 'ECG' ? 'selected' : '' }}>
                                        ECG</option>
                                    <option value="NST"
                                        {{ old('appointment', $appointment->appointment) == 'NST' ? 'selected' : '' }}>
                                        NST</option>
                                    <option value="Consultation"
                                        {{ old('appointment', $appointment->appointment) == 'Consultation' ? 'selected' : '' }}>
                                        Consultation</option>
                                    <option value="Drug Test"
                                        {{ old('appointment', $appointment->appointment) == 'Drug Test' ? 'selected' : '' }}>
                                        Drug Test</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="message" class="fw-semibold mb-1">Additional Message (optional)</label>
                                <textarea class="form-control expanding-textarea" id="message" name="message" rows="1">{{ old('message', $appointment->message) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold">Update
                                Appointment</button>
                        </form>
                    </div>
                </div>
                <div class="col-5 bg-primary-subtle rounded-2">
                    <div class="text-center mt-2">
                        <h3 class="mb-3 fw-bold bg-white px-5 py-2 rounded-5" style="color:#012970;">Consultation
                    </div>
                    @forelse ($consultation as $data)
                        <div class="row px-4 mt-2">
                            <div class="col bg-white rounded-3 py-1 px-3">
                                <h4 class="fw-bold">{{ $data->day }}</h4>
                                <p class="fw-semibold"><b>{{ $data->consultation }}</b> - {{ $data->doctor }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="row px-4 mt-4">
                            <div class="col bg-white rounded-3 py-1 px-3">
                                <h5 class="fw-bold">No <span class="text-danger">Consultation</span> Available</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div> <!-- Closing the container div -->
    </section>
</x-app-layout> <!-- Closing the x-app-layout component -->
