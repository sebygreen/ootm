<x-layout.root title="New Synopsis">
    <body class="form">
    <main id="new-synopsis">
        <div class="wrapper">
            <h2>New Synopsis</h2>
            <form action="/office/synopses/new" method="POST">
                @csrf
                <div class="group required">
                    <label for="year">Year</label>
                    <div class="select">
                        <select required name="year" id="year">
                            @foreach($range as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                            <path
                                d="M181.66,170.34a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-48-48a8,8,0,0,1,11.32-11.32L128,212.69l42.34-42.35A8,8,0,0,1,181.66,170.34Zm-96-84.68L128,43.31l42.34,42.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,85.66Z"></path>
                        </svg>
                    </div>
                    <svg class="asterisk" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M211,103.43l-70.13,28,49.47,63.61a8,8,0,1,1-12.63,9.82L128,141,78.32,204.91a8,8,0,0,1-12.63-9.82l49.47-63.61L45,103.43A8,8,0,0,1,51,88.57l69,27.61V40a8,8,0,0,1,16,0v76.18l69-27.61A8,8,0,1,1,211,103.43Z"></path>
                    </svg>
                </div>
                <div class="group required">
                    <label for="urls">Links</label>
                    <div class="links" id="links">
                        <input type="hidden" name="urls" id="urls" value="[]">
                        <div class="form">
                            <div class="group required">
                                <label for="link">URL</label>
                                <input type="url" id="link" name="link" />
                                <svg class="asterisk" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 256 256">
                                    <path
                                        d="M211,103.43l-70.13,28,49.47,63.61a8,8,0,1,1-12.63,9.82L128,141,78.32,204.91a8,8,0,0,1-12.63-9.82l49.47-63.61L45,103.43A8,8,0,0,1,51,88.57l69,27.61V40a8,8,0,0,1,16,0v76.18l69-27.61A8,8,0,1,1,211,103.43Z"></path>
                                </svg>
                            </div>
                            <div class="inline">
                                <div class="group required">
                                    <label for="type">Type</label>

                                    <div class="select">
                                        <select name="type" id="type">
                                            <option value="document">Document</option>
                                            <option value="video">Video</option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 256 256">
                                            <path
                                                d="M181.66,170.34a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-48-48a8,8,0,0,1,11.32-11.32L128,212.69l42.34-42.35A8,8,0,0,1,181.66,170.34Zm-96-84.68L128,43.31l42.34,42.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,85.66Z"></path>
                                        </svg>
                                    </div>
                                    <svg class="asterisk" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         viewBox="0 0 256 256">
                                        <path
                                            d="M211,103.43l-70.13,28,49.47,63.61a8,8,0,1,1-12.63,9.82L128,141,78.32,204.91a8,8,0,0,1-12.63-9.82l49.47-63.61L45,103.43A8,8,0,0,1,51,88.57l69,27.61V40a8,8,0,0,1,16,0v76.18l69-27.61A8,8,0,1,1,211,103.43Z"></path>
                                    </svg>
                                </div>
                                <button class="button full new" type="submit">
                                    Add
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="list"></div>
                    </div>
                    <svg class="asterisk" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M211,103.43l-70.13,28,49.47,63.61a8,8,0,1,1-12.63,9.82L128,141,78.32,204.91a8,8,0,0,1-12.63-9.82l49.47-63.61L45,103.43A8,8,0,0,1,51,88.57l69,27.61V40a8,8,0,0,1,16,0v76.18l69-27.61A8,8,0,1,1,211,103.43Z"></path>
                    </svg>
                </div>
                <div class="checkbox">
                    <label for="shown">Shown</label>
                    <label class="switch" for="shown">
                        <input type="checkbox" id="shown" name="shown" value="1" />
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="submit">
                    <a class="button full" href="/office/synopses">
                        Cancel
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                            <path
                                d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                        </svg>
                    </a>
                    <button class="button full" type="submit">
                        Submit
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 256 256"
                        >
                            <path
                                d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path>
                        </svg>
                    </button>
                </div>
            </form>
            @if($errors->any())
                <div class="errors">
                    <div class="heading">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 256 256">
                            <path
                                d="M235.33,116.72,139.28,20.66a16,16,0,0,0-22.56,0l-96,96.06a16,16,0,0,0,0,22.56l96.05,96.06h0a16,16,0,0,0,22.56,0l96.05-96.06a16,16,0,0,0,0-22.56ZM120,80a8,8,0,0,1,16,0v56a8,8,0,0,1-16,0Zm8,104a12,12,0,1,1,12-12A12,12,0,0,1,128,184Z"></path>
                        </svg>
                        <p>Error</p>
                    </div>
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
