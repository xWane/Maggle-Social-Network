
let theSection = document.querySelector("#theSection")
document.addEventListener("DOMContentLoaded", appelAPI)

setInterval(() => {
    appelAPI()
},2000);

function appelAPI() {
    fetch(`/reseaux_php-1/html_partial/messagerie/messagerie-js.php`)
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        theSection.innerHTML = "";
        // stock les donner envoyé par l'API
        data.ressult.forEach(ressult => {
            let div = document.createElement("div")
            div.innerHTML = ressult.text
            theSection.appendChild(div)
        });
    })
}

document.querySelector("#new_message_form").addEventListener("submit", function(event) {
    event.preventDefault()
    fetch(`/reseaux_php-1/html_partial/messagerie/messagerie.php`, {
        method: "POST",
        body: new FormData(this)
    }) .then(() => {
        document.querySelector("#textArea").value = "";
        appelAPI();
    })
})