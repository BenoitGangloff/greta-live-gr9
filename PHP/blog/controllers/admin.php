<?php 

// Vérification du rôle
if (!hasRole(ROLE_ADMIN)) {
    http_response_code(403);
    echo 'Accès interdit';
    exit;
}

// Traitements : récupérer les articles
$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

// Affichage : inclusion du fichier de template
$template = 'admin';
$script = '<script src="js/admin.js" defer></script>';
include '../templates/base_admin.phtml';




