<x-app-layout>
    <section id="team" class="mt-2 team font-web">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-danger">Profile Information</h2>
                {{-- <p class="font-web">Profile Information</p> --}}
            </header>
            <div class="row">
                <div class="col-3 text-center">
                    <img src="{{ url('images/default.jpg') }}" height="250px" width="250px"
                        class="border border-1 border-secondary" style="border-radius: 50%" alt="Profile Picture"><br>
                    <div class="text-center mt-1">
                        <button class="btn btn-primary"><i class="fa-solid fa-pen me-1"></i>Edit Profile</button>
                    </div>
                </div>
                <div class="col-3 ms-4">
                    <h6>Name: <b>Mark Bryan Labinay</b></h6>
                    <hr class="mt-0">

                    <h6 class="pt-2">Email: <b>labinaybryan02@gmail.com</b></h6>
                    <hr class="mt-0">
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        @include('profile.partials.delete-user-form')
                    </div </div>
                </div>
            </div>
    </section>
</x-app-layout>
