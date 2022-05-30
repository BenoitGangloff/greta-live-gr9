<?php 

// Inclusion du fichier d'autoload de composer
require '../vendor/autoload.php';

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances
include '../app/config.php';
include '../src/Core/Database.php';
include '../src/Core/AbstractModel.php';
include '../src/Model/ArticleModel.php';
include '../src/Model/CommentModel.php';
include '../src/Model/UserModel.php';
include '../lib/functions.php';

//////////////////////////////////
///////////// ROUTING

// Inclusion du fichier de routes
$routes = include '../app/routes.php';

// // On initialise une variable $page avec une valeur par défaut 'home'
// $page = 'home';

// // On regarde si dans l'URL (dans la chaîne de requête) il existe un paramètre 'page' 
// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// }

// On peut écrire les 3 lignes ci-dessus de la manière suivante :
$page = $_GET['page'] ?? 'home'; // ?? est l'opérateur de fusion NULL : https://www.php.net/manual/fr/language.operators.comparison.php

// Routing : appeler un contrôleur spécifique à la page qu'on souhaite afficher en fonction de l'information contenue dans l'URL
// switch($page) {
//     case 'home':
//         include '../controllers/home.php';
//         break;

// }

// @TODO aller chercher dans le tableau de routes la route qui correspond à la valeur de $page