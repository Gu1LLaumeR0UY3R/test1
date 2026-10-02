<?php
// ROUTEUR : point d'entrée unique  =>  index.php?route=nomDeLaRoute

require_once __DIR__ . '/../config/connexion.php';
require_once __DIR__ . '/../config/helpers.php';

// Chargement automatique des classes (entités, DAO, contrôleurs)
spl_autoload_register(function (string $classe) {
    foreach (['modele/entites', 'modele/dao', 'controleurs'] as $dossier) {
        $fichier = __DIR__ . "/../$dossier/$classe.php";
        if (is_file($fichier)) {
            require_once $fichier;
            return;
        }
    }
});

// route => [Contrôleur, méthode]
$routes = [
    'listerFilms'        => ['ControleurFilm',         'listerFilms'],
    'voirFilm'           => ['ControleurFilm',         'voirFilm'],
    'listerRealisateurs' => ['ControleurRealisateur',  'listerRealisateurs'],
    'voirRealisateur'    => ['ControleurRealisateur',  'voirRealisateur'],
];

$route = $_GET['route'] ?? 'listerFilms';   // accueil par défaut

if (!isset($routes[$route])) {
    http_response_code(404);
    include __DIR__ . '/../vues/VueErreur404.php';
    exit;
}

[$classe, $methode] = $routes[$route];

$pdo        = creerConnexion();
$controleur = new $classe($pdo);
$controleur->$methode();
