<?php

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances
include '../app/config.php';
include '../src/Core/Database.php';
include '../src/Core/AbstractModel.php';
include '../src/Model/ArticleModel.php';
include '../src/Model/CommentModel.php';
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

// Création des modèles
$commentModel = new CommentModel();
$articleModel = new ArticleModel();

////////////////////////////////////////////////
// Gestion du formulaire d'ajout de commentaires
////////////////////////////////////////////////
$errors = [];

if (!empty($_POST)) {

    // Si l'utilisateur n'est pas connecté, on le redirige vers la connexion
    $idUser = getUserId();
    if ($idUser == null) {
        header('Location: login.php');
        exit;
    }

    // Récupération des données du formulaire
    $content = trim($_POST['content']);

    // Validation du formulaire, le champ "content" doit être rempli
    if (strlen($content) == 0) {
        $errors['content'] = 'Vous devez écrire un commentaire';
    }

    // S'il n'y a pas d'erreurs
    if (empty($errors)) {

        // Appel de la fonction insertComment()
        $commentModel->insertComment($content, $idUser, $idArticle);

        // Redirection pour perdre les données en POST et revenir en GET pour ne pas insérer plusieurs fois le même commentaire si l'internaute fait F5
        header('Location: article.php?id=' . $idArticle);
        exit;
    }
}


////////////////////////////////////////////////
// Affichage : article, commentaires
////////////////////////////////////////////////

// On va chercher l'article correspondant
$article = $articleModel->getOneArticle($idArticle);

// On vérifie qu'on a bien récupéré un article, sinon => 404
if (!$article) {

    http_response_code(404);
    echo 'Article introuvable';
    exit; // Si pas d'article => message d'erreur et on arrête tout ! 
}

// Aller chercher les commentaires associés à l'article
$comments = $commentModel->getCommentsByArticleId($idArticle);

// Affichage : inclusion du fichier de template
$template = 'article';
include '../templates/base.phtml';
