<x-layout.root title="Home">
    <body class="main">
    <x-header />
    <main id="home">
        <section id="hero">
            <div class="parallax">
                <img
                    src="/assets/hero.jpg"
                    alt="Beautiful mountain-scape taken in the Alps."
                />
            </div>
            <div class="wrapper">
                <h1>Odyssey of the Mind</h1>
                <p>
                    Helping children explore their
                    <span>creativity</span>,<br />
                    develop their <span>teamwork skills</span>,<br />
                    and <span>seek solutions</span>.
                </p>
                <div class="gallery">
                    <div class="slides">
                        <div class="overflow">
                            @foreach($photos as $photo)
                                <img
                                    @class(['active' => $loop->first])
                                    src="{{$photo->url}}"
                                    alt="Gallery photo."
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about">
            <div class="wrapper">
                <div class="content">
                    <h2>What is Odyssey of the Mind?</h2>
                    <p>
                        Odyssey of the Mind is an International creative
                        problem-solving program specifically dedicated to
                        helping children explore their creativity, seek
                        solutions and develop their teamwork skills. Odyssey
                        of the Mind is a hands-on, engaging, and a social
                        experience. From robotics to acting, painting to
                        engineering, coding to music, participants learn
                        valuable new skills while having fun.
                    </p>
                    <a class="button full" href="/about">
                        Learn More
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 256 256"
                        >
                            <path
                                d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"
                            ></path>
                        </svg>
                    </a>
                </div>
                <img
                    src="/assets/ootm.png"
                    alt="Logo for Odyssey of the Mind International."
                />
            </div>
        </section>
        <section id="tagline">
            <div class="wrapper">
                <h2>
                    <span>Thousands</span> of the most creative students
                    participate in OotM <span>worldwide</span>.
                </h2>
            </div>
        </section>
        <section id="qualities">
            <div class="wrapper">
                <article>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 256 256"
                    >
                        <path
                            d="M208,32H160a16,16,0,0,0-16,16V208a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,176H160V176h24a8,8,0,0,0,0-16H160V136h24a8,8,0,0,0,0-16H160V96h24a8,8,0,0,0,0-16H160V48h48V208ZM77.66,26.34a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,32,64V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V64a8,8,0,0,0-2.34-5.66ZM48,176V80H64v96ZM80,80H96v96H80ZM72,43.31,92.69,64H51.31ZM48,208V192H96v16Z"
                        ></path>
                    </svg>
                    <h3>Odyssey students develop lifelong skills.</h3>
                    <p>
                        Learning the skills that lead them to work
                        effectively as active members of a team Learning to
                        take many individual ideas and thoughts to form
                        superior solutions Being comfortable speaking in
                        public Learning that it is worth taking risks
                        Knowing there are methods to increase the likelihood
                        of the success in risk-taking.
                    </p>
                </article>
                <article>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 256 256"
                    >
                        <path
                            d="M223.85,47.12a16,16,0,0,0-15-15c-12.58-.75-44.73.4-71.41,27.07L132.69,64H74.36A15.91,15.91,0,0,0,63,68.68L28.7,103a16,16,0,0,0,9.07,27.16l38.47,5.37,44.21,44.21,5.37,38.49a15.94,15.94,0,0,0,10.78,12.92,16.11,16.11,0,0,0,5.1.83A15.91,15.91,0,0,0,153,227.3L187.32,193A15.91,15.91,0,0,0,192,181.64V123.31l4.77-4.77C223.45,91.86,224.6,59.71,223.85,47.12ZM74.36,80h42.33L77.16,119.52,40,114.34Zm74.41-9.45a76.65,76.65,0,0,1,59.11-22.47,76.46,76.46,0,0,1-22.42,59.16L128,164.68,91.32,128ZM176,181.64,141.67,216l-5.19-37.17L176,139.31Zm-74.16,9.5C97.34,201,82.29,224,40,224a8,8,0,0,1-8-8c0-42.29,23-57.34,32.86-61.85a8,8,0,0,1,6.64,14.56c-6.43,2.93-20.62,12.36-23.12,38.91,26.55-2.5,36-16.69,38.91-23.12a8,8,0,1,1,14.56,6.64Z"
                        ></path>
                    </svg>
                    <h3>Out of the box thinking.</h3>
                    <p>
                        Students use a hands-on approach to solving a
                        complex, open-ended problem, a problem that has
                        specific design specifications and monetary
                        limitations. The problems incorporate science,
                        technology, engineering, math, art, speaking and
                        acting into the process, with greater emphasis on
                        some elements than on others depending on the
                        Problem chosen by the team.
                    </p>
                </article>
                <article>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 256 256"
                    >
                        <path
                            d="M220.27,158.54a8,8,0,0,0-7.7-.46,20,20,0,1,1,0-36.16A8,8,0,0,0,224,114.69V72a16,16,0,0,0-16-16H171.78a35.36,35.36,0,0,0,.22-4,36.11,36.11,0,0,0-11.36-26.24,36,36,0,0,0-60.55,23.62,36.56,36.56,0,0,0,.14,6.62H64A16,16,0,0,0,48,72v32.22a35.36,35.36,0,0,0-4-.22,36.12,36.12,0,0,0-26.24,11.36,35.7,35.7,0,0,0-9.69,27,36.08,36.08,0,0,0,33.31,33.6,35.68,35.68,0,0,0,6.62-.14V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V165.31A8,8,0,0,0,220.27,158.54ZM208,208H64V165.31a8,8,0,0,0-11.43-7.23,20,20,0,1,1,0-36.16A8,8,0,0,0,64,114.69V72h46.69a8,8,0,0,0,7.23-11.43,20,20,0,1,1,36.16,0A8,8,0,0,0,161.31,72H208v32.23a35.68,35.68,0,0,0-6.62-.14A36,36,0,0,0,204,176a35.36,35.36,0,0,0,4-.22Z"
                        ></path>
                    </svg>
                    <h3>Creative problem solving.</h3>
                    <p>
                        While a conventional education is important,
                        learning to solve problems creatively and
                        confidently gives the students an important edge in
                        their education and career goals. There is
                        creativity inside each of us and OotM teaches how to
                        tap into it, so it can be applied to real-world
                        problems.
                    </p>
                </article>
            </div>
        </section>
        <section id="testimonials">
            <div class="wrapper">
                <div class="heading">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 256 256"
                    >
                        <path
                            d="M100,56H40A16,16,0,0,0,24,72v64a16,16,0,0,0,16,16h60v8a32,32,0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0,0,48-48V72A16,16,0,0,0,100,56Zm0,80H40V72h60ZM216,56H156a16,16,0,0,0-16,16v64a16,16,0,0,0,16,16h60v8a32,32,0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0,0,48-48V72A16,16,0,0,0,216,56Zm0,80H156V72h60Z"
                        ></path>
                    </svg>
                    <h2>What people say about OotM.</h2>
                </div>
                <article>
                    <p class="quote">
                        As a coach, I love witnessing students solve
                        problems that do not have easy answers as the
                        students practice the skills of being creative and
                        innovative thinkers. It is tremendously rewarding
                        watching the students have fun as they try to figure
                        out the "how to" while they learn to ask of
                        themselves open-ended questions that further their
                        thinking.
                        <br />
                        <br />
                        Teams work with constraints when solving Odyssey of
                        the Mind problems, and those constraints anchor
                        creativity. “Magic” happens as teams embrace the
                        ideas of their teammates and are inspired by those
                        ideas. As a coach, I remain in awe at the creative
                        solutions teams devise in their problem-solving. I
                        learn so much from the teams and in the process I
                        learn to be more creative, myself; and yes, the
                        latter is fun!
                    </p>
                    <div class="author">
                        <img
                            src="assets/marcia.jpeg"
                            alt="Marcia Banks, Swiss Association Director of OotM and Coach."
                        />
                        <p>
                            Marcia Banks
                            <br />
                            <span>
                                    Swiss Association Director of OotM, Coach
                                </span>
                        </p>
                    </div>
                </article>
                <div class="grid">
                    @foreach($testimonials as $testimonial)
                        <article>
                            <p class="quote">{{$testimonial->quote}}</p>
                            <div class="author">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 256 256"
                                >
                                    <path
                                        d="M96.26,37A8,8,0,0,1,102,27.29a104.11,104.11,0,0,1,52,0,8,8,0,0,1-2,15.75,8.15,8.15,0,0,1-2-.26,88,88,0,0,0-44,0A8,8,0,0,1,96.26,37ZM33.35,110a8,8,0,0,0,9.85-5.57,87.88,87.88,0,0,1,22-38.09A8,8,0,0,0,53.8,55.14a103.92,103.92,0,0,0-26,45A8,8,0,0,0,33.35,110ZM150,213.22a88,88,0,0,1-44,0,8,8,0,0,0-4,15.49,104.11,104.11,0,0,0,52,0,8,8,0,0,0-4-15.49Zm62.8-108.77a8,8,0,0,0,15.42-4.28,104,104,0,0,0-26-45,8,8,0,1,0-11.41,11.21A88.14,88.14,0,0,1,212.79,104.45Zm15.44,51.39a103.68,103.68,0,0,1-30.68,49.47A8,8,0,0,1,185.07,203a64,64,0,0,0-114.14,0,8,8,0,0,1-12.48,2.32,103.74,103.74,0,0,1-30.68-49.49,8,8,0,0,1,15.42-4.27,87.58,87.58,0,0,0,19,34.88,79.57,79.57,0,0,1,36.1-28.77,48,48,0,1,1,59.38,0,79.57,79.57,0,0,1,36.1,28.77,87.58,87.58,0,0,0,19-34.88,8,8,0,1,1,15.42,4.28ZM128,152a32,32,0,1,0-32-32A32,32,0,0,0,128,152Z"
                                    ></path>
                                </svg>
                                <p>
                                    {{$testimonial->author}}
                                    <br />
                                    <span>{{$testimonial->label}}</span>
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    <x-footer />
    <x-spinner />
    </body>
</x-layout.root>
