<?php 

// Inclusion des dépendances
include '../lib/functions.php';

// Initialisations
$email = '';

// Si le formulaire est soumis...
if (!empty($_POST)) {

    // On récupère les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // On vérifie les identifiants
    $user = checkUser($email, $password);

    // On a trouvé l'utilisateur, les identifiants sont ocrrects...
    if ($user) {

        // Enregistrement du user en session
        var_dump('Identifiants OK');
    
        // Redirection

        exit;
    } 
    else {
        $error = 'Identifiants incorrects';
    }
}

// Inclusion du template
$template = 'login';
include "../templates/base.phtml";