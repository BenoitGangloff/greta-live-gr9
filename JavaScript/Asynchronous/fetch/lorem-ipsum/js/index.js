///////////////////////////////////////////
//////////////// FONCTIONS ////////////////
///////////////////////////////////////////
function onSubmitForm(event)
{
    // On commence par annuler le comportement par défaut du navigateur (soumission du formulaire)
    event.preventDefault();

    // On récupère le nombre de paragraphes souhaités
    const paras = document.querySelector('[name="paras"]').value;

    // Container
    const container = document.getElementById('target');

    // On lance la requête vers l'API Bacon Ipsum
    fetch(`https://baconipsum.com/api/?type=all-meat&paras=${paras}&start-with-lorem=1&format=json`)
        .then(response => response.json())
        .then(paragraphs => {
            container.innerHTML = '';
            for (const paragraph of paragraphs) {
                container.innerHTML += `<p>${paragraph}</p>`; 
            }
        });
}

////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////
document.getElementById('lorem-form').addEventListener('submit', onSubmitForm);