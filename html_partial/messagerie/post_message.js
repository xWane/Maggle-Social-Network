function appelAPI() {
    fetch(`url`)
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        // stock les donner envoyé par l'API
        APIResults = data;
    })
}