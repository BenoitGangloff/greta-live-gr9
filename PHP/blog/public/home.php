<?php

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances
include '../app/config.php';
include '../src/Core/Database.php';
include '../src/Model/ArticleModel.php';
include '../lib/functions.php';

// Traitements : récupérer les articles
$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

// Affichage : inclusion du template
$template = 'home';
include '../templates/base.phtml';
