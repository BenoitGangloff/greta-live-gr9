<?php


// Inclusion des dépendances
include 'functions.php';


//////////////// CODE PRINCIPAL ///////////////

// Initialisation de variables
$error = null;

/**
 * On vérifie que la variable PHP super globale $_POST n'est PAS vide, c'est-à-dire on vérifie qu'on a bien reçu
 * des données dans le corps de la requête en provenance du formulaire. COmme on est dans un fichier séparé, on est
 * à peu près certains que le formulaire a bien été soumis... sauf si une personne malveillante essaie d'appeler le
 * fichier subscribe.php d'une manière détournée. On est jamais trop prudent !
 */
if(!empty($_POST)) {

    // On récupère l'email du formulaire en supprimant au passage les espaces grâce à la fonction trim()
    $email = trim($_POST['email']);

    /**
     * Le formulaire est soumis, on doit récupérer l'email de l'internaute
     * Précaution supplémentaire : on vérifie que le champ 'email' existe bien
     * dans les données reçues. Ou plutôt si ce n'est pas le cas, on arrête tout !
     *
     * On vérifie :
     *
     *    1) Quel le champ email est bien rempli
     *    2) Que l'email a bien un format correct d'email
     *    3) Que l'email n'existe pas déjà
     */
    if (!$email) {
        $error = 'Le champ "Email" est obligatoire';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format de mail invalide';
    }
    elseif (emailExists($email)) {
        $error = 'Cet email est déjà enregistré';
    }

    // S'il n'y a pas d'erreur...
    if ($error === null) { // on peut faire aussi : if (is_null($error)) {

        // Si tout est ok, on va enregistrer l'email
        addSubscriber($email);

        // Redirection vers la page de confirmation
        header('Location: confirmation.html');
        exit;
    }
}

// Inclusion du template
include 'index.phtml';