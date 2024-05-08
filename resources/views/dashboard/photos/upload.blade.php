<x-layout.root title="Upload Photos">
    <body class="form">
    <main id="upload-photos">
        <div class="wrapper">
            <h2>Upload Photos</h2>
            <form action="/dashboard/upload-photos" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="upload required">
                    <label for="images">Images</label>
                    <input type="file" id="images" name="images[]" class="file" accept="image/png, image/jpeg, image/webp" multiple/>
                    <div class="dropzone">
                        <figure class="showcase">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256"><path d="M240,136v64a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V136a16,16,0,0,1,16-16H80a8,8,0,0,1,0,16H32v64H224V136H176a8,8,0,0,1,0-16h48A16,16,0,0,1,240,136ZM85.66,77.66,120,43.31V128a8,8,0,0,0,16,0V43.31l34.34,34.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,77.66ZM200,168a12,12,0,1,0-12,12A12,12,0,0,0,200,168Z"></path></svg>
                        </figure>
                        <div class="details">
                            <ul>
                                <li>.jpg</li>
                                <li>.png</li>
                                <li>.webp</li>
                            </ul>
                            <p>Click or drag to select images.</p>
                        </div>
                    </div>
                    <p class="tooltip">Multiple image uploads are supported.<br>2000kB per file maximum.</p>
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
