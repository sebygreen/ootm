<x-layout.root title="Office">
    <body class="office">
    <x-office.header />
    <main id="office">
        <section id="photos">
            <div class="wrapper">
                <div class="header">
                    <h2>Photos</h2>
                    <a class="button full" href="/office/photos/new">
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
                            <x-office.photo :photo="$photo" />
                        @endforeach
                    </div>
                @else
                    <p class="empty">No photos in the database.</p>
                @endif
            </div>
        </section>
    </main>
    </body>
</x-layout.root>
