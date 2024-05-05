<x-layout.root title="Dashboard">
    <body class="dashboard">
        <x-header.dashboard />
        <main id="dashboard">
            <section id="events">
                <div class="wrapper">
                    <div class="header">
                        <h2>Events</h2>
                        <a class="button icon" href="/new-event">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                            </svg>
                        </a>
                    </div>
                    @if(count($events) > 0)
                        <div class="grid">
                            @foreach($events as $event)
                                <x-article.event
                                    dashboard
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
                        </div>
                    @else
                        <p class="empty">No events in the database.</p>
                    @endif
                </div>
            </section>
            <section id="synopses">
                <div class="wrapper">
                    <div class="header">
                        <h2>Synopses</h2>
                        <a class="button icon" href="/new-synopsis">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                            </svg>
                        </a>
                    </div>
                    @if(count($synopses) > 0)
                        <div class="grid">
                            @foreach($synopses as $synopsis)
                                <x-article.synopsis
                                    dashboard
                                    id="{{$synopsis->id}}"
                                    year="{{$synopsis->year}}"
                                    link="{{$synopsis->link}}"
                                    created="{{$synopsis->created_at}}"
                                    updated="{{$synopsis->updated_at}}"
                                />
                            @endforeach
                        </div>
                    @else
                        <p class="empty">No synopses in the database.</p>
                    @endif
                </div>
            </section>
            <section id="photos">
                <div class="wrapper">
                    <div class="header">
                        <h2>Photos</h2>
                        <a class="button icon" href="/new-photo">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                            </svg>
                        </a>
                    </div>
                    @if(count($photos) > 0)
                        <div class="grid">
                            @foreach($photos as $photo)
                                <x-article.photo
                                    id="{{$photo->id}}"
                                    path="{{$photo->path}}"
                                    created="{{$photo->created_at}}"
                                />
                            @endforeach
                        </div>
                    @else
                        <p class="empty">No photos in the database.</p>
                    @endif
                </div>
            </section>
            <section id="users">
                <div class="wrapper">
                    <div class="header">
                        <h2>Users</h2>
                        @if(Auth::user()->admin)
                            <a class="button icon" href="/new-user">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                    @if(count($users) > 0)
                        <div class="grid">
                            @foreach($users as $user)
                                <x-article.user
                                    id="{{$user->id}}"
                                    name="{{$user->name}}"
                                    email="{{$user->email}}"
                                    admin="{{$user->admin}}"
                                    created="{{$user->created_at}}"
                                />
                            @endforeach
                        </div>
                    @else
                        <p class="empty">No users in the database.</p>
                    @endif
                </div>
            </section>
        </main>
    </body>
</x-layout.root>
