///////////////////////////////////////////
//////////////// FONCTIONS ////////////////
///////////////////////////////////////////
function getUserLocation()
{
    return new Promise( (resolve, reject) => {
        if (!navigator.geolocation) {
            return reject({message: 'API de géolocalisation non disponible sur votre navigateur'});
        }

        navigator.geolocation.getCurrentPosition(resolve, reject);
    });
}

function displayCoords(position) 
{
    document.querySelector('#latitude-container span + span').textContent = position.coords.latitude;
    document.querySelector('#longitude-container span + span').textContent = position.coords.longitude;
}

function showError(error) 
{
    errorContainer.textContent = error.message;
}

////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////

// Conteneur pour les messages d'erreur
const errorContainer = document.getElementById('error-message');

getUserLocation()
    .then(displayCoords)
    .catch(showError);