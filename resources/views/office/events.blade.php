<x-layout.root title="Office">
    <body class="office">
    <x-office.header />
    <main id="office">
        <section id="events">
            <div class="wrapper">
                <div class="header">
                    <h2>Events</h2>
                    <a class="button full" href="/office/events/new">
                        Create
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                        </svg>
                    </a>
                </div>
                @if(count($events) > 0)
                    <div class="grid">
                        @foreach($events as $event)
                            <x-office.event :event="$event" />
                        @endforeach
                    </div>
                @else
                    <p class="empty">No events in the database.</p>
                @endif
            </div>
        </section>
    </main>
    </body>
</x-layout.root>

