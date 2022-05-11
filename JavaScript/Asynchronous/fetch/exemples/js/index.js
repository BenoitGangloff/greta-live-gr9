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
    fetch('server/getData.php')
        .then(response => response.text()) 
        .then(html => { 
            document.getElementById('container').innerHTML = html;
        });
}


function onClickButton3()
{
    const container = document.getElementById('container');

    fetch('server/getDataJSON.php')
        .then(response => response.json()) 

        //// VERSION 1 : en créant une chaîne de caractères avec interpolation de variable ` ${maVariable} ` 

        .then(users => { 
            container.innerHTML = '';
            for(const user of users) {
                container.innerHTML += `
                    <article>
                        <h3>${user.firstname} ${user.lastname}</h3>
                        <p>${user.email}</p>
                    </article>
                `; 
            }
        });


        //// VERSION 2 : en créant les éléments du DOM avec les méthodes de l'API DOM
        // .then(users => { 
        //     for(const user of users) {
        //         const article = document.createElement('article');
        //         const h3 = document.createElement('h3');
        //         const p = document.createElement('p');
        //         h3.textContent = user.firstname + ' ' + user.lastname;
        //         p.textContent = user.email;
        //         article.appendChild(h3);
        //         article.appendChild(p);
        //         container.appendChild(article);
        //     }
        // });

        //// VERSION 3 : variante de la version 1 avec reduce
        // .then(users => { 
        //     container.innerHTML = users.reduce( (html, user) => {
        //         return html + `
        //                     <article>
        //                         <h3>${user.firstname} ${user.lastname}</h3>
        //                         <p>${user.email}</p>
        //                     </article>
        //                 `
        //     }, '');
        // });
        

}


////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////
document.querySelector('header #button-1').addEventListener('click', onClickButton1);
document.querySelector('header #button-2').addEventListener('click', onClickButton2);
document.querySelector('header #button-3').addEventListener('click', onClickButton3);