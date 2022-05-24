<?php

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances
include '../app/config.php';
include '../lib/functions.php';

////////////////////////////////////////////////
// Récupération de l'id de l'article dans l'URL
////////////////////////////////////////////////

// Validation du paramètre id de l'URL : si le paramètre n'existe pas, n'a pas de valeur ou a une valeur qui comporte autre chose que des chiffres...
if (!array_key_exists('id', $_GET) || !$_GET['id'] || !ctype_digit($_GET['id'])) {

    // ... on fait une erreur 404 NOT FOUND
    http_response_code(404);
    echo 'Article introuvable';
    exit; // Si pas d'id dans l'URL => message d'erreur et on arrête tout ! 
}

// On récupère l'id de l'article à afficher depuis la chaîne de requête
$idArticle = (int) $_GET['id'];


////////////////////////////////////////////////
// Gestion du formulaire d'ajout de commentaires
////////////////////////////////////////////////
$errors = [];

if (!empty($_POST)) {

    // Récupération des données du formulaire
    $content = trim($_POST['content']);

    // Validation du formulaire, le champ "content" doit être rempli
    if (strlen($content) == 0) {
        $errors['content'] = 'Vous devez écrire un commentaire';
    }

    // S'il n'y a pas d'erreurs
    if (empty($errors)) {

        // Pour l'instant on met l'id du user en dur... 
        $idUser = 9;

        // Appel de la fonction insertComment()
        insertComment($content, $idUser, $idArticle);

        // Redirection pour perdre les données en POST et revenir en GET pour ne pas insérer plusieurs fois le même commentaire si l'internaute fait F5
        header('Location: article.php?id=' . $idArticle);
        exit;
    }
}


////////////////////////////////////////////////
// Affichage : article, commentaires
////////////////////////////////////////////////

// On va chercher l'article correspondant
$article = getOneArticle($idArticle);

// On vérifie qu'on a bien récupéré un article, sinon => 404
if (!$article) {

    http_response_code(404);
    echo 'Article introuvable';
    exit; // Si pas d'article => message d'erreur et on arrête tout ! 
}

// Aller chercher les commentaires associés à l'article
$comments = getCommentsByArticleId($idArticle);

// Affichage : inclusion du fichier de template
$template = 'article';
include '../templates/base.phtml';
