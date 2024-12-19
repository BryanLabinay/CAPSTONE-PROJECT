<x-app-layout>
    <section class="hero d-flex align-items-center">
        <div class="container">
            {{-- <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="welcomeModalLabel">Welcome</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Welcome, {{ Auth::user()->name }}!
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">
                        <b class="text-danger">DR</b>. MENDOZA <br> <b class="text-danger">MULTI-SPECIALIST</b>
                        CLINIC
                    </h1>
                    {{-- @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif --}}

                    <h5 class="mt-3" data-aos="fade-up" data-aos-delay="400">
                        <a href="https://www.facebook.com/e.a.mendoza.clinics.aparri"
                            class="d-inline text-decoration-none">
                            <i class="fa-brands fa-facebook d-inline"></i>
                            <h5 class="d-inline location">Dr Mendoza Multi-Specialty Clinic</h5>
                        </a>
                    </h5>
                    {{-- <h5 class="mt-2" data-aos="fade-up" data-aos-delay="400">
                        <a href="https://maps.app.goo.gl/M1zmacbQNn5DR1pT8" class="d-inline text-decoration-none">
                            <i class="fa-solid fa-lg fa-location-dot d-inline"></i>
                            <h6 class="d-inline location">Magsaysay St, Aparri, Cagayan</h6>
                        </a>
                    </h5> --}}
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        "Your journey to wellness begins here. Let us be your partners in health and healing."
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="/Appointment"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center text-decoration-none ">
                                <span>Book Now</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ url('assets/img/Staff/staff.png') }}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Who We Are</h3>
                            <h2>
                                Your Partner in Health and Wellness
                            </h2>
                            <p>
                                Welcome to our clinic. We prioritize your health with compassionate, efficient care. Our
                                advanced appointment system ensures quick, hassle-free scheduling. Our experienced team
                                offers comprehensive medical services, tailored to your needs. Partner with us for your
                                wellness journey.
                            </p>
                            {{-- <div class="text-center text-lg-start">
                                <a href="{{ route('login') }}"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center text-decoration-none">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    {{-- <div class="col-lg-6 d-flex align-items-center justify-content-center" style="height: 80vh;"
                        data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/about.jpg" class="img-fluid rounded-3" alt=""
                            style="height: 100%; object-fit: cover;" />
                    </div> --}}

                </div>
            </div>
        </section>

        <!-- ======= Features Section ======= -->
        <section id="services" class="features">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2 class="text-danger">Services</h2>
                    <h3 class="fw-semibold" style="color: #012970;">We prioritize your health and well-being.</h3>
                </header>

                <div class="row">
                    <div class="col-lg-5 d-flex justify-content-center">
                        <img src="{{ asset('assets/img/serve.jpg') }}" class="img-fluid w-75 rounded-3"
                            alt="Services" />
                    </div>

                    <div class="col-lg-7 mt-2 mt-lg-0 d-flex">
                        <div class="row align-self-center justify-content-center gy-4">
                            @forelse ($services as $data)
                                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                    <div class="feature-box d-flex align-items-center">
                                        <i class="bi bi-check"></i>
                                        <h3>{{ $data->service }}</h3>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                    <div class="feature-box d-flex align-items-center">
                                        <i class="fa-solid fa-rectangle-xmark"></i>
                                        <h3>No services available at the moment.</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- / row -->
            </div>
        </section>
        <!-- End Features Section -->

        <section id="consultation" class="service">
            <!-- Feature Icons -->
            <div class="row feature-icons mb-0" id="consultation" data-aos="fade-up">
                <header class="section-header">
                    <h2 class="text-danger">Consultation</h2>
                    <h3 class="fw-semibold" style="color: #012970;">Offering expert consultation for your
                        healthcare needs.</h3>
                </header>
                <div class="row mt-0">
                    <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets/img/consultation.jpg') }}" class="img-fluid p-4" alt="" />
                    </div>

                    <div class="col-xl-8 d-flex content">
                        <div class="row align-self-center gy-4">
                            @forelse ($consultation as $data)
                                <div class="col-md-6 icon-box shadow-sm" data-aos="fade-up">
                                    {{-- <i class="fa-solid fa-check"></i> --}}
                                    <div>
                                        <h5 class="fw-bold" style="color: #012970;">{{ $data->consultation }}
                                        </h5>
                                        <p class="text-muted">
                                            {{ $data->day }} - Dr. {{ $data->doctor }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    {{-- <i class="fa-solid fa-check"></i> --}}
                                    <div>
                                        <h4>No Consultation at the moment.</h4>
                                        {{-- <p>
                                                Consequuntur sunt aut quasi enim aliquam quae harum
                                                pariatur laboris nisi ut aliquip
                                            </p> --}}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Feature Icons -->
        </section>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2 class="text-danger">Contact</h2>
                    <h3 class="fw-semibold" style="color: #012970;">Contact Us</h3>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    @forelse ($contact as $data)
                                        <p>{{ $data->address }}</p>
                                    @empty
                                        <p>Location</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    @forelse ($contact as $data)
                                        <p>{{ $data->cpnumber }}</p>
                                    @empty
                                        <p>No Contact</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    @forelse ($contact as $data)
                                        <p>{{ $data->email }}</p>

                                    @empty
                                        <p>No Email displayed</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Open Hours</h3>
                                    @forelse ($contact as $data)
                                        <p>{{ $data->day_open }}<br />{{ $data->open_hour }}</p>
                                    @empty
                                        <p>No Date set yet.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Your Name" required />
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Your Email" required />
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required />
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">
                                        Your message has been sent. Thank you!
                                    </div>

                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>

</x-app-layout>
