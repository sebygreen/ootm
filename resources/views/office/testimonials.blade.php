<x-layout.root title="Office">
    <body class="office">
    <x-office.header />
    <main id="office">
        <section id="testimonials">
            <div class="wrapper">
                <div class="header">
                    <h2>Testimonials</h2>
                    @if(Auth::user()->admin)
                        <a class="button full" href="/office/testimonials/new">
                            Create
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                            </svg>
                        </a>
                    @endif
                </div>
                @if(count($testimonials) > 0)
                    <div class="grid">
                        @foreach($testimonials as $testimonial)
                            <x-office.testimonial :testimonial="$testimonial" />
                        @endforeach
                    </div>
                @else
                    <p class="empty">No testimonials in the database.</p>
                @endif
            </div>
        </section>
    </main>
    </body>
</x-layout.root>
