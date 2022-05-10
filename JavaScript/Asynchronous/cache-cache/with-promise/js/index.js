///////////////////////////////////////////
//////////////// FONCTIONS ////////////////
///////////////////////////////////////////
function wolfCount()
{
    return new Promise( resolve => {
        console.log("Le loup commence à compter !");

        const MAX = 5;
        let count = 1;
    
        const timer = setInterval( () => {
            console.log(`${count}...`);
            count++;
            if (count > MAX) {
                clearInterval(timer);
                resolve();
            }
        }, 1000);
    });    
}

function sheepHides()
{
    console.log('Les moutons commencent à se cacher !')
}

function wolfSearch()
{   
    console.log('Le loup va chercher les moutons...');
}

////////////////////////////////////////////
//////////////// CODE PRINCIPAL ////////////
////////////////////////////////////////////
console.log('Le script se lance...');

wolfCount()
    .then(wolfSearch);

sheepHides();
