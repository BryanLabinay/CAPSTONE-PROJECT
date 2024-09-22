<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1">
                <h2 class="text-danger">Doctor & Staff</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Our hard working Doctor and Staff</h3>

            </header>

            <div class="row gy-4 mt-1">
                @foreach ($doctorStaff as $data)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img shadow-sm">
                                <img src="{{ asset('Doctors/' . $data->image) }}" class="img-fluid"
                                    alt="{{ $data->name }}" style="object-fit: cover; width: 100%; height: 200px;" />
                                {{-- <img src="" class="card-img-top" alt="{{ $event->title }}"
                                    style="object-fit: cover; width: 100%; height: 350px;"> --}}
                            </div>
                            <div class="member-info">
                                <h4>{{ $data->name }}</h4>
                                <span class="fw-bold text-danger">{{ $data->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</x-app-layout>
