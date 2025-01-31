<x-app-layout>
    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 text-center text-lg-start d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">
                        <b class="text-danger">DR</b>. MENDOZA <br> <b class="text-danger">MULTI-SPECIALIST</b> CLINIC
                    </h1>
                    <h5 class="mt-3" data-aos="fade-up" data-aos-delay="400">
                        <a href="https://www.facebook.com/e.a.mendoza.clinics.aparri"
                            class="d-inline text-decoration-none">
                            <i class="fa-brands fa-facebook d-inline"></i>
                            <h5 class="d-inline location">Dr Mendoza Multi-Specialty Clinic</h5>
                        </a>
                    </h5>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        "Your journey to wellness begins here. Let us be your partners in health and healing."
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="/Appointment"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center text-decoration-none">
                                <span>Book Now</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-md-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ url('assets/img/Staff/staff.png') }}" class="img-fluid w-100" alt="" />
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <section id="services" class="features">
            <div class="container" data-aos="fade-up">
                <header class="section-header text-center">
                    <h2 class="text-danger">Services</h2>
                    <h3 class="fw-semibold" style="color: #012970;">We prioritize your health and well-being.</h3>
                </header>

                <div class="row">
                    <div class="col-lg-5 col-md-12 d-flex justify-content-center">
                        <img src="{{ asset('assets/img/serve.jpg') }}" class="img-fluid w-100 rounded-3"
                            alt="Services" />
                    </div>

                    <div class="col-lg-7 col-md-12 mt-2 mt-lg-0 d-flex">
                        <div class="row align-self-center justify-content-center gy-4">
                            @forelse ($services as $data)
                                <div class="col-md-6 col-sm-12" data-aos="zoom-out" data-aos-delay="200">
                                    <div class="feature-box d-flex align-items-center">
                                        <i class="bi bi-check"></i>
                                        <h3>{{ $data->service }}</h3>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-6 col-sm-12" data-aos="zoom-out" data-aos-delay="300">
                                    <div class="feature-box d-flex align-items-center">
                                        <i class="fa-solid fa-rectangle-xmark"></i>
                                        <h3>No services available at the moment.</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header text-center">
                    <h2 class="text-danger">Contact</h2>
                    <h3 class="fw-semibold" style="color: #012970;">Contact Us</h3>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-6 col-md-12">
                        <div class="row gy-4">
                            <div class="col-md-6 col-sm-12">
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
                            <div class="col-md-6 col-sm-12">
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
                            <div class="col-md-6 col-sm-12">
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
                            <div class="col-md-6 col-sm-12">
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

                    <div class="col-lg-6 col-md-12">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required />
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required />
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required />
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
