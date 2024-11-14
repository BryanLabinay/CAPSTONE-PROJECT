<x-app-layout>
    <section id="team" class="mt-3 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header p-1">
                <h2 class="text-danger">Message</h2>
                <h3 class="font-web fw-bold" style="color: #012970;">Chat here</h3>

            </header>


            <div class="row gy-4 mt-1">
                {{ $user->id }}
                {{ $user->fname }}
            </div>
        </div>
    </section>
</x-app-layout>
