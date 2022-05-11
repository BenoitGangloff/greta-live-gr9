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

        // Une fois qu'on reçoit la réponse, on parse le contenu du body en précisant qu'il s'agit de données au format JSON
        .then(response => response.json())

        // Une fois les données parsées, on récupère un tableau de paragraphes de lorem ipsum
        .then(paragraphs => {

            // On efface la zone sur la page
            container.innerHTML = '';

            // On parcours les paragraphes et pour chaque paragraphe...
            for (const paragraph of paragraphs) {

                // ... on concatène à ce qu'il y a déjà un nouveau paragraphe de texte !
                container.innerHTML += `<p>${paragraph}</p>`; 
            }
        });
}

////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////
document.getElementById('lorem-form').addEventListener('submit', onSubmitForm);