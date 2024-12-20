<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1">
                <h2 class="text-danger">News and Updates</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Daily News and Updates</h3>
            </header>

            <div class="row">
                <div class="col-12" style="position: relative;">
                    <img src="{{ asset('assets/img/bg.jpg') }}" alt=""
                        class="img-fluid w-100 shadow-sm rounded-2" style="height: 180px; object-fit: cover;">
                    <h1 class="text-uppercase fw-bold text-center"
                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #FB4141; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                        {{ $event->title }}
                    </h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <h6 class="me-3"><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}
                    </h6>
                    <h6><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</h6>
                </div>
                {{-- DESCRIPTION --}}
                <div class="col-12 mt-3">
                    <h5 style="word-spacing: 5px;">&emsp;{{ $event->description }}</h5>
                </div>
                {{-- ACTIVITY --}}
                <div class="col-12 mt-3">
                    <h5>&emsp;{{ $event->activity }}</h5>
                </div>
                {{-- LOCATION --}}
                <div class="col-12 mt-3">
                    <h5>&emsp;{{ $event->location }}</h5>
                </div>
                {{-- Who can Attend --}}
                <div class="col-12 mt-3">
                    <h5>&emsp;{{ $event->attend }}</h5>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
