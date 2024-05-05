<div id="menu">
    <header>
        <div class="wrapper">
            <img
                alt="Logo for Odyssey of the Mind Switzerland."
                src="/assets/logo.png"
            />
            <!--desktop (768px)-->
            <nav>
                <a href="/" @class(['active' => request()->is('/')])>Home</a>
                <a href="/calendar" @class(['active' => request()->is('calendar')])>Dates, Places & Events</a>
                <a href="/synopses" @class(['active' => request()->is('synopses')])>Long Term Problems</a>
                <a href="/about" @class(['active' => request()->is('about')])>About</a>
            </nav>
            <div class="actions">
                <!--mobile (default)-->
                <button class="button icon" id="toggle">
                    <svg
                        class="sandwich"
                        fill="currentColor"
                        viewBox="0 0 22 22"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <rect
                            style="transform: translateY(-4px)"
                            class="top"
                            height="1.5"
                            rx="0.75"
                            width="18"
                            x="2"
                            y="10.5"
                        />
                        <rect
                            style="transform: translateY(4px)"
                            class="bottom"
                            height="1.5"
                            rx="0.75"
                            width="18"
                            x="2"
                            y="10.5"
                        />
                    </svg>
                </button>
                <a class="button icon" href="/login">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                </a>
            </div>
        </div>
    </header>
    <!--mobile (default)-->
    <nav class="mobile" style="opacity: 0">
        <a href="/" style="transform: translateY(-5px); opacity: 0" @class(['active' => request()->is('/')])>Home</a>
        <a href="/calendar" style="transform: translateY(-5px); opacity: 0" @class(['active' => request()->is('calendar')])>Dates, Places & Events</a>
        <a href="/synopses" style="transform: translateY(-5px); opacity: 0" @class(['active' => request()->is('synopses')])>Long Term Problems</a>
        <a href="/about" style="transform: translateY(-5px); opacity: 0" @class(['active' => request()->is('about')])>About</a>
    </nav>
</div>
