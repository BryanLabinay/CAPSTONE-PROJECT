<x-app-layout>
    <section id="team" class="mt-5 team font-web">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-3 text-center">
                    <img src="{{ url('images/default.jpg') }}" height="250" width="250"
                        class="border border-1 border-secondary" style="border-radius: 50%;" alt="Profile Picture"><br>
                    <div class="mt-1">
                        <button class="btn btn-primary"><i class="fa-solid fa-pen me-1"></i>Edit Profile</button>
                    </div>
                </div>
                <div class="col-9 d-flex align-items-center"> <!-- Changed col-3 to col-9 for better layout -->
                    <div>
                        <h4 class="mb-0">Name: <b>Mark Bryan Labinay</b></h4>
                        <h4 class="mb-0">Email: <b>labinaybryan02@gmail.com</b></h4>
                    </div>
                </div>
            </div>



            {{-- <div class="row gy-4">
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
            </div> --}}
        </div>
    </section>
</x-app-layout>
