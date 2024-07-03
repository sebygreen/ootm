<x-layout.root title="Dashboard">
    <body class="dashboard">
    <x-dashboard.header />
    <main id="dashboard">
        <section id="events">
            <div class="wrapper">
                <div class="header">
                    <h2>Events</h2>
                    <a class="button full" href="/dashboard/new-event">
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
                            <x-dashboard.event :event="$event" />
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
                    <a class="button full" href="/dashboard/new-synopsis">
                        Create
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                        </svg>
                    </a>
                </div>
                @if(count($synopses) > 0)
                    <div class="grid">
                        @foreach($synopses as $synopsis)
                            <x-dashboard.synopsis :synopsis="$synopsis" />
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
                    <a class="button full" href="/dashboard/upload-photos">
                        Upload
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                        </svg>
                    </a>
                </div>
                @if(count($photos) > 0)
                    <div class="grid">
                        @foreach($photos as $photo)
                            <x-dashboard.photo :photo="$photo" />
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
                        <a class="button full" href="/dashboard/new-user">
                            Create
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
                            <x-dashboard.user :user="$user" />
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
