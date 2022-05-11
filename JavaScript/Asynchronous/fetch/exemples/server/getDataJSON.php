<?php 

/**
 * On construit un tableau de données de test
 * Plus tard ces données proviendront de la base de données
 */
$users = [
    [
        'firstname' => 'Alfred',
        'lastname' => 'DUPONT',
        'email' => 'alfred@gmail.com'
    ],
    [
        'firstname' => 'Léa',
        'lastname' => 'CAMPO',
        'email' => 'lea@gmail.com'
    ]
];

/**
 * On encode le tableau d'utilisateurs en JSON
 * et on envoie les données au client avec le echo
 */
echo json_encode($users);
exit;