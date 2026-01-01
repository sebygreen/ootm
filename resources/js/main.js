import { animate, createTimeline, stagger } from "animejs";
import { v4 as uuidv4 } from "uuid";

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
    //new synopsis links
    links();
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
        const timeline = createTimeline({
            easing: "easeInOutQuint",
        });
        container.classList.add("open");
        nav.classList.add("shown");
        timeline.add([svg.top, svg.bottom], {
            translateY: 0,
            duration: 200,
        });
        timeline.add(
            svg.top,
            {
                rotate: 45,
                duration: 200,
            },
            200,
        );
        timeline.add(
            svg.bottom,
            {
                rotate: -45,
                duration: 200,
            },
            200,
        );
        timeline.add(
            nav,
            {
                opacity: 1,
                duration: 400,
            },
            0,
        );
        timeline.add(
            links,
            {
                opacity: 1,
                translateY: 0,
                duration: 400,
                delay: stagger(50),
            },
            0,
        );
    }

    function close() {
        const timeline = createTimeline({
            easing: "easeOutQuint",
        });
        timeline.add([svg.top, svg.bottom], {
            rotate: 0,
            duration: 200,
        });
        timeline.add(
            svg.top,
            {
                translateY: -4,
                duration: 200,
            },
            200,
        );
        timeline.add(
            svg.bottom,
            {
                translateY: 4,
                duration: 200,
            },
            200,
        );
        timeline.add(
            nav,
            {
                opacity: 0,
                duration: 400,
            },
            0,
        );
        timeline.add(
            links,
            {
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
        animate([document.documentElement, document.body], {
            scrollTop: 0,
            duration: 1000,
            easing: "easeInOutQuint",
        });
    });
}

function gallery() {
    const container = document.querySelector(".gallery");
    if (!container) {
        return;
    }
    let duration = 4000;
    let interval = null;
    let moving = false;
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
        animate(overflow, {
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
        animate(overflow, {
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
    animate(loader, {
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
                reader.onload = function(e) {
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
            reader.onload = function(e) {
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

function links() {
    const root = document.getElementById("links");
    if (!root) return;

    const elements = {
        link: root.querySelector("#link"),
        type: root.querySelector("#type"),
        new: root.querySelector(".new"),
        list: root.querySelector(".list"),
        input: root.querySelector("input#urls"),
    };

    function Link(link, type) {
        this.id = uuidv4();
        this.link = link;
        this.type = type;
    }

    const create = {
        link: (data) => {
            let article = document.createElement("article");
            article.className = "link";
            article.dataset.id = data.id;
            let link = document.createElement("p");
            link.classList.add("link");
            link.innerHTML = data.link;
            article.appendChild(link);
            let type = document.createElement("p");
            type.classList.add("type");
            type.innerHTML = data.type;
            article.appendChild(type);
            let actions = document.createElement("div");
            actions.className = "actions";
            actions.appendChild(create.action("delete", "x", handle.delete));
            article.appendChild(actions);
            return article;
        },
        action: (name, icon, action) => {
            let button = document.createElement("button");
            button.className = `button icon ${name}`;
            button.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                </svg>
            `;
            button.addEventListener("click", (event) => action(event));
            return button;
        },
    };

    const handle = {
        new: (e) => {
            e.preventDefault();
            let link = elements.link.value;
            let type = elements.type.value;
            if (link === "") return;
            if (type !== "document" && type !== "video") return;
            let article = new Link(link, type);
            links.push(article);
            elements.link.value = "";
            elements.type.value = "document";
            elements.list.appendChild(create.link(article));
            elements.input.value = JSON.stringify(links.map((l) => ({ link: l.link, type: l.type })));
        },
        delete: (e) => {
            e.preventDefault();
            let article = e.target.closest("article");
            let index = links.findIndex((i) => i.id === article.dataset.id);
            links.splice(index, 1);
            article.remove();
            elements.input.value = JSON.stringify(links);
        },
    };

    let links = [];
    const extracted = JSON.parse(elements.input.value);
    if (!links.length && extracted.length) {
        links = extracted.map((i) => new Link(i.link, i.type));
        links.forEach((i) => elements.list.appendChild(create.link(i)));
    }

    elements.new.addEventListener("click", handle.new);
    elements.link.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            elements.new.click();
        }
    });
}
