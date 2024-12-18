<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DR. MENDOZA MULTI-SPECIALIST</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ 'Image/logo/mendoza.png' }}" type="image/x-icon">
    {{-- <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" /> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    {{-- Font-Awesome --}}
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top p-1">
        <div class="container-fluid d-flex align-items-center justify-content-between px-5">
            <a href="#hero" class="logo d-flex align-items-center text-decoration-none">
                <img src="{{ url('assets/img/mendoza.png') }}" alt="" />
                <span class="text-decoration-none"><b class="text-danger">DR</b>. MENDOZA</span>
            </a>

            <nav id="navbar" class="navbar mx-auto">
                <ul class="d-flex align-items-center justify-content-center">
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#consultation">Consultation</a></li>
                    <li><a href="#portfolio" class="text-decoration-none">Blog</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#team">Doctor & Staff</a></li> --}}
                    {{-- <li class="dropdown">
                        <a href="#" class="text-decoration-none"><span>HealthHub</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown">
                                <a href="#"><span>Deep Drop Down</span>
                                    <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> --}}
                    <li><a href="#news" class="text-decoration-none">News & Update</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

                    <!-- Move Login/Logout Button to the End -->
                    {{-- <li>
                        @auth
                            <a class="getstarted scrollto text-decoration-none" href="{{ route('home') }}">Home</a>
                            <script>
                                // Automatically redirect to the dashboard if authenticated
                                window.location.href = "{{ route('home') }}";
                            </script>
                        @else
                            <a class="getstarted scrollto text-decoration-none" href="{{ route('login') }}">Login</a>
                        @endauth
                    </li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>


    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">
                        <b class="text-danger">DR</b>. MENDOZA <br> <b class="text-danger">MULTI-SPECIALIST</b>
                        CLINIC
                    </h1>

                    <h5 class="mt-2" data-aos="fade-up" data-aos-delay="400">
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
                        "Expert care, easy booking. Reserve your appointment with us now."
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            {{-- <a href="{{ route('login') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center text-decoration-none ">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a> --}}
                            @auth
                                <a href="{{ route('home') }}"
                                    class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center text-decoration-none ">
                                    <span>Home</span>
                                    <i class="bi bi-arrow-right"></i></a>
                                <script>
                                    // Automatically redirect to the dashboard if authenticated
                                    window.location.href = "{{ route('home') }}";
                                </script>
                            @else
                                <a href="{{ route('login') }}"
                                    class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center text-decoration-none ">
                                    <span>Get Started</span>
                                    <i class="bi bi-arrow-right"></i></a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ url('assets/img/Staff/staff.png') }}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

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
        <!-- End About Section -->

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
                        <img src="{{ asset('assets/img/consultation.jpg') }}" class="img-fluid p-4"
                            alt="" />
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

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2 class="text-danger">Blog</h2>
                    <h3 class="fw-semibold" style="color: #012970;">Our latest Updates</h3>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            {{-- <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li> --}}
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @forelse ($blog as $data)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                @if ($data->img)
                                    <img src="{{ asset('uploads/blogs/' . $data->img) }}" class="img-fluid"
                                        alt="{{ $data->title }}" style="object-fit: cover;" />
                                @else
                                    <img src="{{ asset('') }}" class="img-fluid" alt="{{ $data->title }}"
                                        style="object-fit: cover;" />
                                @endif
                                <img src="{{ asset('uploads/blogs/' . $data->img) }}" class="img-fluid"
                                    alt="{{ $data->title }}" />
                                <div class="portfolio-info">
                                    <h4>App 1</h4>
                                    <p>App</p>
                                    <div class="portfolio-links">
                                        <a href="{{ url('Image/Activity/img1.jpg') }}"
                                            data-gallery="portfolioGallery" class="portfokio-lightbox"
                                            title="App 1"><i class="bi bi-plus"></i></a>
                                        {{-- <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ url('Image/Activity/img2.jpg') }}" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ url('Image/Activity/img2.jpg') }}" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ url('Image/Activity/img3.jpg') }}" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ url('Image/Activity/img3.jpg') }}" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="news" class="values">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2 class="text-danger">News & Updates</h2>
                    <h3 class="fw-semibold" style="color: #012970;">Check the news and updates of our clinic</h3>
                </header>

                <div class="row">
                    @forelse ($events as $event)
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card shadow-sm h-100">
                                <!-- Event Image -->
                                <div class="card-img-top">
                                    @if ($event->img)
                                        <img src="{{ asset($event->img) }}"
                                            class="img-fluid mx-auto d-block w-75 rounded-top" alt="Event Image" />
                                    @else
                                        <img src="{{ asset('assets/img/mendoza.png') }}"
                                            class="img-fluid mx-auto d-block w-75 rounded-top" alt="Default Image" />
                                    @endif
                                </div>

                                <!-- Card Content -->
                                <div class="card-body d-flex flex-column">
                                    <h3 class="card-title text-center">{{ $event->title }}</h3>
                                    <h5 class="card-subtitle text-muted">
                                        {{ \Illuminate\Support\Str::limit($event->activity, 40, '...') }}</h5>

                                    <p class="card-text mt-2">
                                        {{ \Illuminate\Support\Str::limit($event->description, 50, '...') }}
                                    </p>

                                    <!-- Event Date -->
                                    <p class="mt-auto text-muted small">
                                        <strong>Date:</strong>
                                        {{ \Carbon\Carbon::parse($event->date)->format('l, d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- No Events Available -->
                        <div class="col-12 text-center">
                            <p class="text-muted">No events available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
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
                                    <p>Magsaysay St,<br />Aparri, Cagayan</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>09175744643</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>eamendozaclinic00@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Open Hours</h3>
                                    <p>Monday - Saturday<br />8:00AM - 04:00PM</p>
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
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center text-decoration-none ">
                            <img src="{{ asset('assets/img/mendoza.png') }}" alt="Medonza Logo" />
                            <span><b class="text-danger">DR</b>. MENDOZA</span>
                        </a>
                        <p>
                            Dr. Mendoza Clinic's Multi-Health Specialists Management System is designed to streamline
                            the management of medical information and appointments, ensuring efficient coordination
                            between patients and service providers. The system offers secure and seamless access to
                            essential health information while enhancing the overall patient experience.
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Navigation</h4>
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Home</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">About</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Services</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">News & Update</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            {{-- <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">X-Ray</a>
                            </li> --}}@foreach ($services as $service)
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <a href="#services">{{ $service->service }}</a>
                                </li>
                            @endforeach
                            {{-- <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Ultrasound</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">2D Echo with Doppler</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">ECG</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">NST</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Consultation</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Drug Test</a>
                            </li> --}}
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>
                            Magsaysay Street <br />
                            Aparri, Cagayan<br />
                            <br />
                            <strong>Phone:</strong>09175744643<br />
                            <strong>Email:</strong>eamendozaclinic00@gmail.com<br />
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>DR. MENDOZA</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ url('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
