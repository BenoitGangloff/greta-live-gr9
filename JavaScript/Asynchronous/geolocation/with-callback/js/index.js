/**
 * Notion de FONCTION DE CALLBACK (fonction de rappel) : une fonction donnée en paramètre d'une autre fonction
 * qui sera appelée plus tard par JavaScript.  
 * 
 * Ici on utilise des fonctions de callbacks pour dire à JavaScript ce que l'on souhaite faire 
 * en cas de succès (les coordonnées GPS ont été trouvées) et en cas d'échec (les coordonnées n'ont pas pu être trouvées)
 * 
 * On fait appel à des fonctions de callback lorsqu'on lance une tâche qui PREND UN CERTAIN TEMPS
 */


///////////////////////////////////////////
//////////////// FONCTIONS ////////////////
///////////////////////////////////////////
function onSuccess(position) 
{
    document.querySelector('#latitude-container span + span').textContent = position.coords.latitude;
    document.querySelector('#longitude-container span + span').textContent = position.coords.longitude;
}

function onError(error) 
{
    errorContainer.textContent = error.message;
}

////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////

// Conteneur pour les messages d'erreur
const errorContainer = document.getElementById('error-message');

// On commence par vérifier que l'API de Géolocalisation existe sur le matériel de l'internaute
if (!navigator.geolocation) {
    errorContainer.txteContent = 'API de géolocalisation non disponible sur votre matériel';
}

// L'API est bien disponible, on peut l'utiliser
else {
    navigator.geolocation.getCurrentPosition(onSuccess, onError);
}

/**
 * VERSION AVEC FONCTIONS ANONYMES ET FLECHEES
 */
//  navigator.geolocation.getCurrentPosition(position => {
//     document.querySelector('#latitude-container span + span').textContent = position.coords.latitude;
//     document.querySelector('#longitude-container span + span').textContent = position.coords.longitude;
//  }, error => {
//     errorContainer.textContent = error.message;
//  });