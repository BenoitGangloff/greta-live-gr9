<?php

// Inclusion des dépendances
include '../lib/functions.php';

// Traitements : récupérer les articles
$articles = getAllArticles();

// Affichage : inclusion du template
$template = 'home';
include '../templates/base.phtml';
