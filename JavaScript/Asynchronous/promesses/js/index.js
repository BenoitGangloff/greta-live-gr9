// Je créer un objet de la classe Promise pour simuler le lancer d'une pièce en pariant sur pile
const promise = new Promise( (resolve, reject) => {

    // Je tire au hasard un nombre entre 1 et 10
    const rand = Math.floor(Math.random() * 10) + 1;

    // Si ce nombre est pair (pair => pile), je gagne, je résouds la promesse
    if (rand % 2 == 0){
        resolve();
    } 
    // Sinon, c'est impair (face), je perd, je rejète la promesse
    else {
        reject();
    }
});

/**
 * Grâce aux méthodes then() et catch() on réagit au succès ou à l'échec de la promesse
 */
promise
    .then( () => {
        console.log("Pile, c'est gagné !");
    })
    .catch( () => {
        console.log("Face, c'est perdu !");
    });