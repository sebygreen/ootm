<x-layout.root title="New User">
    <body class="form">
    <main id="edit-password">
        <div class="wrapper">
            <h2>Edit Password</h2>
            <form action="/edit-password?id={{Auth::id()}}" method="POST">
                @csrf
                <div class="group">
                    <label for="current">Current</label>
                    <input type="password" id="current" name="current"/>
                </div>
                <div class="group">
                    <label for="new">New</label>
                    <input type="password" id="new" name="new"/>
                </div>
                <div class="group">
                    <label for="new_confirmation">Confirm New</label>
                    <input type="password" id="new_confirmation" name="new_confirmation"/>
                </div>
                <button class="button full" type="submit">
                    Submit
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 256 256"
                    >
                        <path
                            d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"
                        ></path>
                    </svg>
                </button>
            </form>
            @if($errors->any())
                <div>
                    <p>Something went wrong!</p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </main>
    <x-spinner />
    </body>
</x-layout.root>
