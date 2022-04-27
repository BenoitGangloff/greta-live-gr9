<?php 

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances 
include '../lib/functions.php';

// Initialisations
$errors = [];

// Si le formulaire est soumis...
if (!empty($_POST)) {

    // On récupère les données du formulaire
    $title = strip_tags(trim($_POST['title']));
    $abstract = strip_tags(trim($_POST['abstract']));
    $content = strip_tags(trim($_POST['content'])); // @TODO si éditeur WYSIWYG => autoriser certaines balises HTML
    $image = strip_tags(trim($_POST['image'])); // @TODO remplacer le champ type text par un champ d'upload de fichier

    // On valide les données (titre et contenu obligatoires)
    if (!$title) {
        $errors['title'] = 'Le champ "Titre" est obligatoire';
    }

    if (!$content) {
        $errors['content'] = 'Le champ "Contenu" est obligatoire';
    }

    // Si tout est OK (pas d'erreurs)...
    if (empty($errors)) {

        // On enregistre l'article
        addArticle($title, $abstract, $content, $image);

        // On redirige l'internaute (pour l'instant vers une page de confirmation)
        header('Location: admin.php');
        exit;
    }
}

// Inclusion du template
$template = 'add_article';
include '../templates/base_admin.phtml';