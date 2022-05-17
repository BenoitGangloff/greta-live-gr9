<?php

// Déclaration du typage strict pour éviter les conversions sauvages de PHP
declare(strict_types=1);

// Inclusion des dépendances
include 'functions.php';
include 'class/Shape.php';
include 'class/Rectangle.php';
include 'class/Ellipse.php';
include 'class/Polygon.php';

// Création d'un rectangle
$rect = new Rectangle();
$rect->setLocation(50, 100);
$rect->setSize(200, 75);
$rect->setFill('green', 0.8);

// Création d'une ellipse
$ell = new Ellipse();
$ell->setLocation(420, 359);
$ell->setRadius(50, 120);
$ell->setFill('blue', 0.5);

// Création d'un polygone
$poly = new Polygon();
$poly->setPoints(200, 300, 150, 400, 50, 150, 600, 550, 450, 100);
$poly->setFill('crimson', 1);

// Construction du code SVG
$svg = '<svg width="1200" height="800">';

// Ajout des formes
$svg .= $rect->draw();
$svg .= $ell->draw();
$svg .= $poly->draw();

$svg .= '</svg>';


// Inclusion du template
include 'index.phtml';