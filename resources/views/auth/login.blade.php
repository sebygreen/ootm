<x-layout.root title="About">
    <body class="form">
    <main id="login">
        <div class="wrapper">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="group">
                    <label for="email">Email</label>
                    <input required type="email" id="email" name="email"/>
                </div>
                <div class="group">
                    <label for="password">Password</label>
                    <input required type="password" id="password" name="password"/>
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
