<x-layout.root title="About">
    <body class="form">
    <main id="login">
        <div class="wrapper">
            <h2>Login</h2>
            <form action="/dashboard/login" method="POST">
                @csrf
                <div class="group required">
                    <label for="email">Email</label>
                    <input required type="email" id="email" name="email"/>
                    <svg class="asterisk" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M211,103.43l-70.13,28,49.47,63.61a8,8,0,1,1-12.63,9.82L128,141,78.32,204.91a8,8,0,0,1-12.63-9.82l49.47-63.61L45,103.43A8,8,0,0,1,51,88.57l69,27.61V40a8,8,0,0,1,16,0v76.18l69-27.61A8,8,0,1,1,211,103.43Z"></path>
                    </svg>
                </div>
                <div class="group required">
                    <label for="password">Password</label>
                    <input required type="password" id="password" name="password"/>
                    <svg class="asterisk" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M211,103.43l-70.13,28,49.47,63.61a8,8,0,1,1-12.63,9.82L128,141,78.32,204.91a8,8,0,0,1-12.63-9.82l49.47-63.61L45,103.43A8,8,0,0,1,51,88.57l69,27.61V40a8,8,0,0,1,16,0v76.18l69-27.61A8,8,0,1,1,211,103.43Z"></path>
                    </svg>
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
