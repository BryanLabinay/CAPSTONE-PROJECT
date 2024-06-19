<x-app-layout>
    <section id="team" class="mt-2 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-danger">Events</h2>
                <p class="font-web">Daily Events</p>
            </header>

            <div class="row gy-4">
                @forelse ($events as $event)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card card-hover">
                            <img src="{{ asset('uploads/' . $event->img) }}" class="card-img-top" height="350"
                                width="500" alt="{{ $event->title }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 fw-bold">{{ $event->title }}</h6>
                                    <small class="text-muted">{{ $event->formattedTimestamp }}</small>
                                </div>
                                <p class="card-text">
                                    {{ strlen($event->description) > 140 ? substr($event->description, 0, 140) . '...' : $event->description }}
                                </p>
                                <a href="#" class="text-decoration-none btn-hover">Read More <i
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
