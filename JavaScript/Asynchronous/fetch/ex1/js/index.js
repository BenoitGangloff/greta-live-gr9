///////////////////////////////////////////
//////////////// FONCTIONS ////////////////
///////////////////////////////////////////
function onClickButton1()
{
    /**
     * J'appelle la fonction fetch() qui va envoyer une requête HTTP vers l'URL que je lui donne en paramètre
     * Elle retourne une promesse qui sera résolue avec la réponse HTTP à la requête envoyée
     * Je récupère cette réponse en paramètre de la fonction anonyme du premier .then()
     */
    fetch('server/partial.html')
        .then(response => response.text()) // On lit le contenu du corps de la réponse en texte brut pour récupérer le code HTML
        .then(html => { // la méthode .then() retourne systématiquement une promesse : on peut donc enchaîner avec un deuxième .then() qui va récupérer le code HTML 
            document.getElementById('container').innerHTML = html; // Il ne reste plus qu'à insérer le code HTML dans la page
        });

    /**
     * Remarque : on peut parser le corps de la réponse (objet Response) avec différentes méthodes en fonction de la nature des données récupérées : 
     *  .text() : texte brut (HTML, texte, etc)
     *  .json() : JSON
     *  .blob() : fichier binaire (image, etc)
     */
}

function onClickButton2()
{
    /**
     * J'appelle la fonction fetch() qui va envoyer une requête HTTP vers l'URL que je lui donne en paramètre
     * Elle retourne une promesse qui sera résolue avec la réponse HTTP à la requête envoyée
     * Je récupère cette réponse en paramètre de la fonction anonyme du premier .then()
     */
    fetch('server/getData.php')
        .then(response => response.text()) // On lit le contenu du corps de la réponse en texte brut pour récupérer le code HTML
        .then(html => { // la méthode .then() retourne systématiquement une promesse : on peut donc enchaîner avec un deuxième .then() qui va récupérer le code HTML 
            document.getElementById('container').innerHTML = html; // Il ne reste plus qu'à insérer le code HTML dans la page
        });

    /**
     * Remarque : on peut parser le corps de la réponse (objet Response) avec différentes méthodes en fonction de la nature des données récupérées : 
     *  .text() : texte brut (HTML, texte, etc)
     *  .json() : JSON
     *  .blob() : fichier binaire (image, etc)
     */
}




////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////
document.querySelector('header #button-1').addEventListener('click', onClickButton1);
document.querySelector('header #button-2').addEventListener('click', onClickButton2);