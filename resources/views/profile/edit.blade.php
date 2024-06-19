<x-app-layout>
    <section id="team" class="mt-2 team font-web">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-danger">Profile</h2>
                <p class="font-web">Profile Information</p>
            </header>

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

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
