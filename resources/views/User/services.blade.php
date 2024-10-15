<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1">
                <h2 class="text-danger">Services</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Our clinic services</h3>
            </header>

            @foreach ($service as $data)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row h-100">
                            <!-- Image Section -->
                            <div class="service-image" style="flex: 0 0 150px; flex-md: 0 0 100px;">
                                <img src="{{ URL('uploads/service/' . $data->img) }}" class="img-fluid rounded-1"
                                    alt="{{ $data->service }}" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>

                            <!-- Text Section -->
                            <div class="service-content ms-md-3 mt-3 mt-md-0" style="flex-grow: 1;">
                                <h5 class="fw-bolder text-black">{{ $data->service }}</h5>
                                <p class="card-text text-black">• {{ $data->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach






            {{-- @foreach ($service as $data)
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="col-lg-4 col-md-6 " data-aos="fade-up" data-aos-delay="100">
                            <div class="w-100">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ URL('uploads/service/' . $data->img) }}" class="img-fluid"
                                        alt="{{ $data->service }}" style="height: 250px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <h5 class="card-title fw-bolder">{{ $data->service }}</h5>
                            <p class="card-text">{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach --}}
        </div>
    </section>
</x-app-layout>
