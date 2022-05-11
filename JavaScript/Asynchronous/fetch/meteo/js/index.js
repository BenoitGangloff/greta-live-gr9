///////////////////////////////////////////
//////////////// FONCTIONS ////////////////
///////////////////////////////////////////

/**
 * Récupère la position de l'utilisateur
 * @returns {Promise} 
 */
function getUserLocation()
{
    return new Promise( (resolve, reject) => {
        if (!navigator.geolocation) {
            return reject({message: 'API de géolocalisation non disponible sur votre navigateur'});
        }

        navigator.geolocation.getCurrentPosition(resolve, reject);
    });
}

/**
 * Affiche la position de l'utilisateur
 * @param {Object} position 
 */
function displayCoords(position) 
{
    document.querySelector('#latitude-container span + span').textContent = position.coords.latitude;
    document.querySelector('#longitude-container span + span').textContent = position.coords.longitude;
}

/**
 * Affiche un message d'erreur
 * @param {string} error 
 */
function showError(error) 
{
    errorContainer.textContent = error.message;
}

/**
 * Récupère les données météo à un point GPS précis (latitude/longitude)
 * @param {*} latitude 
 * @param {*} longitude 
 * @returns 
 */
function getWeather(latitude, longitude)
{
    return new Promise((resolve) => {
        const API_TOKEN = 'acaeeb66204c112d0b0a317f12d542d8ef535aae57ec50c4482c03cb21e51331';
        const BASE_URL = 'https://api.meteo-concept.com/api';
        const endpoint = '/forecast/daily';
        const url = BASE_URL + endpoint + `?token=${API_TOKEN}&latlng=${latitude},${longitude}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                resolve(data);  
            });
    });
}

////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////

// Conteneur pour les messages d'erreur
const errorContainer = document.getElementById('error-message');

getUserLocation()
    .then(position => {
        displayCoords(position);
        return getWeather(position.coords.latitude, position.coords.longitude)
    })
    .then(weatherData => {
        console.log(weatherData);
    })
    .catch(showError);