<?php

// Constantes
const FILENAME = 'subscribers.json';


//////////////// FONCTIONS ////////////////

/**
 * Récupère des données stockées dans un fichier JSON
 * @param string $filepath
 * @return mixed
 */
function loadJSON(string $filepath)
{
    // Si le fichier spécifié n'existe pas on retourne false
    if (!file_exists($filepath)) {
        return false;
    }

    // On récupère le contenu du fichier
    $jsonData = file_get_contents($filepath);

    // On retourne les données désérialisées
    return json_decode($jsonData);
}

/**
 * Ecrit des données dans un fichier au format JSON
 * @param string $filename
 * @param $data
 * @return void
 */
function saveJSON(string $filename, $data)
{
    // On sérialise les données en JSON
    $jsonData = json_encode($data);

    // On écrit le JSON dans le fichier
    file_put_contents($filename, $jsonData);
}

/**
 * Retourne le tableau des abonnés ou un tableau vide s'il n'y a pas encore d'abonnés
 * @return array
 */
function loadSubscribers(): array
{
    // On récupère le contenu de notre fichier d'abonnés
    $subscribers = loadJSON(FILENAME);

    // S'il n'existe pas ou est vide, on retourne un tableau vide
    if (!$subscribers) {
        return [];
    }

    // Sinon on retourne le contenu du fichier (le tableau contenant les emails des abonnés)
    return $subscribers;
}

/**
 * Vérifie qu'un email est présent dans le fichier des abonnés
 * @param string $email
 * @return bool
 */
function emailExists(string $email): bool
{
    // On récupère le contenu de notre fichier d'abonnés
    $subscribers = loadSubscribers();

    // On regarde si l'email est présent dans le tableau
    return in_array($email, $subscribers);
}

/**
 * Ajoute un abonné au fichier
 * @param string $email
 * @return void
 */
function addSubscriber(string $email)
{
    // On récupère le contenu de notre fichier d'abonnés
    $subscribers = loadSubscribers();

    // On ajoute l'email dans le tableau
    $subscribers[] = $email;

    // On enregistre à nouveau le tableau dans le fichier
    saveJSON(FILENAME, $subscribers);
}
