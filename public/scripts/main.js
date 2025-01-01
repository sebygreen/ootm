import anime from "./anime.es.js";

document.addEventListener("DOMContentLoaded", () => {
    //mobile menu
    menu();
    //hero parallax
    parallax();
    //scroll to top
    top();
});

//window ready/images loaded
window.addEventListener("load", () => {
    //hero photo gallery
    gallery();
    //remove loading state
    loader();
    //file upload
    dropzone();
});

function menu() {
    const container = document.querySelector("#menu");

    if (!container) {
        return;
    }

    const button = container.querySelector("#toggle");
    const nav = container.querySelector("nav.mobile");
    const links = nav.querySelectorAll("a");
    const svg = {
        top: button.querySelector("rect.top"),
        bottom: button.querySelector("rect.bottom"),
    };

    function open() {
        const timeline = anime.timeline({
            easing: "easeInOutQuint",
        });
        container.classList.add("open");
        nav.classList.add("shown");
        timeline.add({
            targets: [svg.top, svg.bottom],
            translateY: 0,
            duration: 200,
        });
        timeline.add(
            {
                targets: svg.top,
                rotate: 45,
                duration: 200,
            },
            200,
        );
        timeline.add(
            {
                targets: svg.bottom,
                rotate: -45,
                duration: 200,
            },
            200,
        );
        timeline.add(
            {
                targets: nav,
                opacity: 1,
                duration: 400,
            },
            0,
        );
        timeline.add(
            {
                targets: links,
                opacity: 1,
                translateY: 0,
                duration: 400,
                delay: anime.stagger(50),
            },
            0,
        );
    }

    function close() {
        const timeline = anime.timeline({
            easing: "easeOutQuint",
        });
        timeline.add({
            targets: [svg.top, svg.bottom],
            rotate: 0,
            duration: 200,
        });
        timeline.add(
            {
                targets: svg.top,
                translateY: -4,
                duration: 200,
            },
            200,
        );
        timeline.add(
            {
                targets: svg.bottom,
                translateY: 4,
                duration: 200,
            },
            200,
        );
        timeline.add(
            {
                targets: nav,
                opacity: 0,
                duration: 400,
            },
            0,
        );
        timeline.add(
            {
                targets: links,
                opacity: 0,
                translateY: -5,
                duration: 100,
                complete: () => {
                    container.classList.remove("open");
                    nav.classList.remove("shown");
                },
            },
            0,
        );
    }
    function toggle() {
        container.classList.contains("open") ? close() : open();
    }

    button.addEventListener("click", toggle);
}

function parallax() {
    const container = document.querySelector(".parallax");
    if (!container) {
        return;
    }

    function scroll() {
        const offset = window.scrollY;
        const layer = container.querySelector("img");
        const depth = 0.3;
        const movement = offset * depth;
        layer.style.transform = `translate3d(0, ${movement}px, 0)`;
    }

    window.addEventListener("scroll", scroll);
}

function top() {
    const top = document.querySelector("button.top");

    if (!top) {
        return;
    }

    top.addEventListener("click", () => {
        anime({
            targets: [document.documentElement, document.body],
            scrollTop: 0,
            duration: 1000,
            easing: "easeInOutQuint",
        });
    });
}

function gallery() {
    let duration = 5000;
    let interval = null;
    let moving = false;
    const container = document.querySelector(".gallery");
    if (!container) {
        return;
    }
    const overflow = container.querySelector(".overflow");
    const controls = {
        next: container.querySelector(".button.next"),
        back: container.querySelector(".button.back"),
        toggle: container.querySelector(".button.toggle"),
    };

    controls.next.addEventListener("click", () => {
        if (moving) return;
        if (interval) toggle();
        next();
    });
    controls.back.addEventListener("click", () => {
        if (moving) return;
        if (interval) toggle();
        back();
    });
    controls.toggle.addEventListener("click", toggle);

    function next() {
        moving = true;
        const current = overflow.querySelector(".active");
        const target = current.nextElementSibling;
        const offset = current.clientWidth + 15;
        anime({
            targets: overflow,
            translateX: -offset,
            duration: 500,
            easing: "easeInOutQuint",
            complete: () => {
                current.classList.remove("active");
                overflow.appendChild(current);
                overflow.style.transform = "translateX(0)";
                target.classList.add("active");
                moving = false;
            },
        });
    }

    function back() {
        moving = true;
        const current = overflow.querySelector(".active");
        const target = overflow.lastElementChild;
        const offset = target.clientWidth + 15;
        overflow.insertBefore(target, overflow.firstChild);
        overflow.style.transform = `translateX(${-offset}px)`;
        anime({
            targets: overflow,
            translateX: 0,
            duration: 500,
            easing: "easeInOutQuint",
            complete: () => {
                current.classList.remove("active");
                target.classList.add("active");
                moving = false;
            },
        });
    }

    function toggle() {
        if (!interval) {
            interval = setInterval(next, duration);
            controls.toggle.querySelector("svg.play").classList.remove("shown");
            controls.toggle.querySelector("svg.pause").classList.add("shown");
        } else {
            clearInterval(interval);
            interval = null;
            controls.toggle.querySelector("svg.pause").classList.remove("shown");
            controls.toggle.querySelector("svg.play").classList.add("shown");
        }
    }

    interval = setInterval(next, duration);
}

function loader() {
    const loader = document.querySelector("#spinner");
    loader &&
        anime({
            targets: loader,
            opacity: 0,
            scale: 0,
            duration: 200,
            easing: "linear",
            complete: () => (loader.style.display = "none"),
        });
}

function dropzone() {
    //https://stackoverflow.com/a/18650828/11476286
    function formatBytes(bytes, decimals) {
        if (!+bytes) return "0B";

        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ["B", "kB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];

        const i = Math.floor(Math.log(bytes) / Math.log(k));

        return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`;
    }

    const input = document.querySelector("form input.file");
    const dropzone = document.querySelector("form .dropzone");

    if (!input || !dropzone) {
        return;
    }

    const showcase = dropzone.querySelector(".showcase");
    const placeholder = showcase.querySelector("svg");
    const details = dropzone.querySelector(".details");
    const ul = details.querySelector("ul");
    const p = details.querySelector("p");
    const prevents = (e) => e.preventDefault();

    input.addEventListener("change", prevents);

    // onchange event
    input.addEventListener("change", (e) => {
        let files = e.target.files;

        console.log(files, files.length);

        if (files.length) {
            showcase.classList.add("active");
            placeholder && placeholder.remove();
            ul && ul.remove();
            p && (p.innerHTML = `${files.length} ${files.length > 1 ? "images" : "image"} selected.`);
            [...files].forEach((item) => {
                let article = document.createElement("article");
                let size = document.createElement("p");
                let image = document.createElement("img");

                size.innerText = formatBytes(item.size, 0);

                const reader = new FileReader();
                reader.onload = function (e) {
                    image.setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(item);

                article.appendChild(image);
                article.appendChild(size);

                showcase.appendChild(article);
            });
        }

        // if file exists
        if (!files && files[0]) {
            // convert current info children to non-live array
            let children = Array.prototype.slice.call(details.children);
            // remove children
            for (let child of children) {
                child.remove();
            }

            // create p tag with filename
            let name = document.createElement("p");
            details.appendChild(name);
            name.innerHTML = files[0].name;
            // create p tag with readable size
            let list = document.createElement("ul");
            let size = document.createElement("li");
            list.appendChild(size);
            details.appendChild(list);
            size.innerHTML = formatBytes(files[0].size, 2);

            // send to background
            const reader = new FileReader();
            // change background once file is loaded
            reader.onload = function (e) {
                // remove placeholder svg
                if (placeholder) {
                    placeholder.remove();
                }
                // change background of showcase
                showcase.style.backgroundImage = "url(" + e.target.result + ")";
            };
            // read file
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // dropzone switches
    const active = () => {
        dropzone.classList.add("active");
    };
    const inactive = () => {
        dropzone.classList.remove("active");
    };

    // dropzone drag events
    ["dragenter", "dragleave", "dragover", "drop", "click"].forEach((e) => {
        dropzone.addEventListener(e, prevents);
    });
    dropzone.addEventListener("dragenter", active);
    ["dragleave", "drop"].forEach((e) => {
        dropzone.addEventListener(e, inactive);
    });

    // drop event
    dropzone.addEventListener("drop", (e) => {
        input.files = e.dataTransfer.files;
        input.dispatchEvent(new Event("change"));
    });

    // click event
    dropzone.addEventListener("click", () => {
        input.click();
        dropzone.blur();
    });
}
