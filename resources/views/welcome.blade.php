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
                    <li><a class="nav-link scrollto" href="#services">Consultation</a></li>
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
                    <li><a href="#" class="text-decoration-none">News & Update</a></li>
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
                    <h5 class="mt-2" data-aos="fade-up" data-aos-delay="400">
                        <a href="https://maps.app.goo.gl/M1zmacbQNn5DR1pT8" class="d-inline text-decoration-none">
                            <i class="fa-solid fa-lg fa-location-dot d-inline"></i>
                            <h6 class="d-inline location">Magsaysay St, Aparri, Cagayan</h6>
                        </a>
                    </h5>

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
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
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
                            <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center text-decoration-none">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/Staff/cover.jpg" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Services</h2>
                    <p>Our Services</p>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Xray</h3>
                            {{-- <p>
                                Provident nihil minus qui consequatur non omnis maiores. Eos
                                accusantium minus dolores iure perferendis tempore et
                                consequatur.
                            </p> --}}
                            <a href="#" class="read-more"><span>Read More</span> <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Labaratory</h3>
                            {{-- <p>
                                Ut autem aut autem non a. Sint sint sit facilis nam iusto
                                sint. Libero corrupti neque eum hic non ut nesciunt dolorem.
                            </p> --}}
                            <a href="#" class="read-more"><span>Read More</span> <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Ultrasound</h3>
                            {{-- <p>
                                Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                            </p> --}}
                            <a href="#" class="read-more"><span>Read More</span> <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-box red">
                            <i class="ri-discuss-line icon"></i>
                            <h3>2D Echo with Doppler</h3>
                            {{-- <p>
                                Non et temporibus minus omnis sed dolor esse consequatur.
                                Cupiditate sed error ea fuga sit provident adipisci neque.
                            </p> --}}
                            <a href="#" class="read-more"><span>Read More</span> <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Consultation</h3>
                            {{-- <p>
                                Cumque et suscipit saepe. Est maiores autem enim facilis ut
                                aut ipsam corporis aut. Sed animi at autem alias eius labore.
                            </p> --}}
                            <a href="#" class="read-more"><span>Read More</span> <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
                        <div class="service-box pink">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Drug Test</h3>
                            {{-- <p>
                                Hic molestias ea quibusdam eos. Fugiat enim doloremque aut
                                neque non et debitis iure. Corrupti recusandae ducimus enim.
                            </p> --}}
                            <a href="#" class="read-more"><span>Read More</span> <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Check our latest work</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ url('Image/Activity/img1.jpg') }}" class="img-fluid" alt="" />
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ url('Image/Activity/img1.jpg') }}" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

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

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
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
        {{-- <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h4>Our Newsletter</h4>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero, ex?
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email" /><input type="submit" value="Subscribe" />
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center text-decoration-none ">
                            <img src="assets/img/mendoza.png" alt="" />
                            <span><b class="text-danger">DR</b>. MENDOZA</span>
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi vitae esse in exercitationem
                            repudiandae doloremque enim. Inventore, dolores similique, porro perferendis architecto aut
                            enim, placeat consequuntur accusantium ad laborum possimus!
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Home</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">About us</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Services</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Terms of service</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Privacy policy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">X-Ray</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Labaratory</a>
                            </li>
                            <li>
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
                            </li>
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
