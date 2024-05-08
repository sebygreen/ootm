<x-layout.root title="Dates, Places & Events">
    <body class="main">
    <x-header />
    <main id="calendar">
        <div class="wrapper">
            <section id="title">
                <h1>Events</h1>
                <div class="timestamp">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 256 256"
                    >
                        <path
                            d="M224,48V96a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h28.69L182.06,73.37a79.56,79.56,0,0,0-56.13-23.43h-.45A79.52,79.52,0,0,0,69.59,72.71,8,8,0,0,1,58.41,61.27a96,96,0,0,1,135,.79L208,76.69V48a8,8,0,0,1,16,0ZM186.41,183.29a80,80,0,0,1-112.47-.66L59.31,168H88a8,8,0,0,0,0-16H40a8,8,0,0,0-8,8v48a8,8,0,0,0,16,0V179.31l14.63,14.63A95.43,95.43,0,0,0,130,222.06h.53a95.36,95.36,0,0,0,67.07-27.33,8,8,0,0,0-11.18-11.44Z"
                        ></path>
                    </svg>
                    <p>{{Carbon\Carbon::parse($latest)->diffForHumans()}}</p>
                </div>
            </section>
            <section id="events">
                @if(count($events) > 0)
                    @foreach($events as $event)
                        <article class="event">
                            <h2>{{html_entity_decode($event->title)}}</h2>
                            @if($event->description)
                                <p class="description">{{html_entity_decode($event->description)}}</p>
                            @endif
                            <ul class="metadata">
                                <li>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 256 256"
                                    >
                                        <path
                                            d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-68-76a12,12,0,1,1-12-12A12,12,0,0,1,140,132Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,132ZM96,172a12,12,0,1,1-12-12A12,12,0,0,1,96,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,140,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,172Z"
                                        ></path>
                                    </svg>
                                    @if($event->end)
                                        <p>{{Carbon\Carbon::parse($event->start)->isoFormat("MMMM DD")." – ".Carbon\Carbon::parse($event->end)->isoFormat("MMMM DD").", ".Carbon\Carbon::parse($event->start)->year}}</p>
                                    @else
                                        <p>{{Carbon\Carbon::parse($event->start)->isoFormat("MMMM DD").", ".Carbon\Carbon::parse($event->start)->year}}</p>
                                    @endif
                                    <p></p>
                                </li>
                                @if($event->location)
                                    <li>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 256 256"
                                        >
                                            <path
                                                d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"
                                            ></path>
                                        </svg>
                                        <p>{{html_entity_decode($event->location)}}</p>
                                    </li>
                                @endif
                            </ul>
                        </article>
                    @endforeach
                @else
                    <p class="empty">No events in the database.</p>
                @endif
            </section>
        </div>
    </main>
    <x-footer />
    <x-spinner />
    </body>
</x-layout.root>
