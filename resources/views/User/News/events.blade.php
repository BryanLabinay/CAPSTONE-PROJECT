<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1">
                <h2 class="text-danger">News & Updates</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Daily News and Updates</h3>
            </header>

            <div class="row">
                @forelse ($events as $event)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card card-hover">
                            @if ($event->img)
                                <img src="{{ asset('uploads/events/' . $event->img) }}" class="card-img-top"
                                    alt="{{ $event->title }}" style="object-fit: cover; width: 100%; height: 350px;">
                            @else
                                <img src="{{ asset('assets/img/news.jpg') }}" class="card-img-top" alt="Default Image"
                                    style="object-fit: cover; width: 100%; height: 350px;">
                            @endif

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 fw-bold">{{ $event->title }}</h6>
                                    <small class="text-muted">{{ $event->formattedTimestamp }}</small>
                                </div>
                                <p class="card-text">
                                    {{ strlen($event->description) > 85 ? substr($event->description, 0, 85) . '...' : $event->description }}
                                </p>
                                <a href="{{ route('event.view', ['id' => $event->id]) }}"
                                    class="text-decoration-none btn-hover">Read More <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="fw-semibold text-center">No Event</h4>
                @endforelse
            </div>

        </div>
    </section>
</x-app-layout>
