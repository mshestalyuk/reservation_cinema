const search = document.querySelector('input[placeholder="Search films..."]'); // Corrected placeholder
const filmContainer = document.querySelector(".films-list");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (films) {
            filmContainer.innerHTML = ""; // Clear the film list
            loadFilms(films);
        }).catch(function(error) {
            console.error('Error:', error); // Log any error in the console
        });
    }
});

function loadFilms(films) {
    films.forEach(film => {
        createFilm(film);
    });
}

function createFilm(film) {
    const template = document.querySelector("#film-template");

    if (!template) {
        console.error("Template element not found");
        return;
    }

    const clone = template.content.cloneNode(true);
    const image = clone.querySelector("img");
    image.src = `/public/img/${film.image}`;
    const name = clone.querySelector("h3");
    name.textContent = film.name; // Use textContent instead of innerHTML when possible for security
    const paragraphs = clone.querySelectorAll("p"); // Use querySelectorAll to get all paragraph elements
    paragraphs[0].textContent = `Director: ${film.director}`;
    paragraphs[1].textContent = `Cast: ${film.cast}`;

    filmContainer.appendChild(clone);
}
