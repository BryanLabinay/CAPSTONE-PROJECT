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
                                @if (!empty($data->img) && file_exists(public_path('uploads/service/' . $data->img)))
                                    <img src="{{ URL('uploads/service/' . $data->img) }}" class="img-fluid rounded-1"
                                        alt="{{ $data->service }}"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <img src="{{ URL('uploads/service/default.png') }}" class="img-fluid rounded-1"
                                        alt="Default Service Image"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                @endif
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

        </div>
    </section>
</x-app-layout>
