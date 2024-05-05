@php
    use Carbon\Carbon;
@endphp

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
                        <p>{{Carbon::parse($updated_at)->diffForHumans()}}</p>
                    </div>
                </section>
                <section id="events">
                    @if(count($events) > 0)
                        @foreach($events as $event)
                            <x-article.event
                                id="{{$event->id}}"
                                title="{{$event->title}}"
                                start="{{$event->start}}"
                                end="{{$event->end}}"
                                description="{{$event->description}}"
                                location="{{$event->location}}"
                                created="{{$event->created_at}}"
                                updated="{{$event->updated_at}}"
                            />
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
