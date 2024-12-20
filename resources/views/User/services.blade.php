<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1">
                <h2 class="text-danger">Services</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Our clinic services</h3>
            </header>

            <div class="row">
                <div class="col-12" style="position: relative;">
                    <img src="{{ asset('assets/img/service.jpg') }}" alt=""
                        class="img-fluid w-100 shadow-sm rounded-2" style="height: 180px; object-fit: cover;">
                    <h1 class="text-uppercase fw-bold"
                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #FB4141; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                        {{ $service }}
                    </h1>
                </div>
            </div>
            @forelse ($services as $data)
                <div class="row mt-3">
                    <div class="col-12">
                        <h5 class="ms-3" style="word-spacing: 5px;"><i
                                class="fa-solid fa-caret-right ms-5 me-2 text-primary"></i>{{ $data->description }}
                        </h5>
                    </div>

                </div>
            @empty
                <h6>No data available for this service.</h6>
            @endforelse


            {{-- 
            <div class="container">
                <ul>
                    @forelse ($services as $data)
                        <li>{{ $data->service }}</li>
                        <li>{{ $data->description }}</li>
                    @empty
                        <p>No data available for this service.</p>
                    @endforelse
                </ul>
            </div> --}}



        </div>
    </section>
</x-app-layout>
