<?php

// Déclaration du typage strict pour éviter les conversions sauvages de PHP
declare(strict_types=1);

// Inclusion des dépendances
include 'functions.php';
include 'class/Rectangle.php';

// Création d'un rectangle
$rect = new Rectangle();
$rect->setLocation(50, 100);
$rect->setSize(200, 75);
$rect->setFill('green', 0.8);


// Construction du code SVG
$svg = '<svg width="1200" height="800">';

// Ajout des formes
$svg .= $rect->draw();

$svg .= '</svg>';


// Inclusion du template
include 'index.phtml';