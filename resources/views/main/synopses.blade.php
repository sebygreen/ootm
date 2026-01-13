<x-layout.root title="Long Term Problems">
    <body class="main">
    <x-header />
    <main id="synopses">
        <div class="wrapper">
            <h1>Long Term Problems</h1>
            <p>
                Odyssey of the Mind problems are not ‘practical’. We do
                not teach OMers how to solve a problem, we teach them
                how to be Problem Solvers!<br /><br />
                Each year, six original Long Term Problems are released:
                five competitive problems for students and one primary
                problem for K-2nd graders. Each problem is original,
                contains a few limitations to work within, and lists
                scoring categories.<br /><br />
                Long-Term Problems are the engine that propels Odyssey
                of the Mind. Teams select their Long-Term Problem when
                they join the program and spend weeks or months to
                create and develop their solution. Each team member will
                find a role to play in the many stages of
                problem-solving that include brainstorming, artwork, set
                design, technical design, writing sketches and much
                more!<br /><br />
                The solutions are presented in a live performance.
                Thousands of teams from all over the world will select
                and solve the same problem but no two solutions are ever
                the same! Long Term problems are different every year
                but they fall into five general categories.<br /><br />
                All Problems have an 8-minute time limit in the final
                presentation.
            </p>
            @if(count($synopses) > 0)
                <div class="grid">
                    @foreach($synopses as $synopsis)
                        <article class="synopsis">
                            <p class="year">{{$synopsis->year}}</p>
                            <div class="links">
                                @foreach(json_decode($synopsis->links) as $link)
                                    <a
                                        class="button icon"
                                        href="{{$link->link}}"
                                    >
                                        @if($link->type === "document")
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 256 256"
                                            >
                                                <path
                                                    d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z"
                                                ></path>
                                            </svg>
                                        @elseif($link->type === "video")
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 256 256"
                                            >
                                                <path
                                                    d="M164.44,105.34l-48-32A8,8,0,0,0,104,80v64a8,8,0,0,0,12.44,6.66l48-32a8,8,0,0,0,0-13.32ZM120,129.05V95l25.58,17ZM216,40H40A16,16,0,0,0,24,56V168a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,128H40V56H216V168Zm16,40a8,8,0,0,1-8,8H32a8,8,0,0,1,0-16H224A8,8,0,0,1,232,208Z"
                                                ></path>
                                            </svg>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <p>No synopses in the database.</p>
            @endif
        </div>
    </main>
    <x-footer />
    <x-spinner />
    </body>
</x-layout.root>
