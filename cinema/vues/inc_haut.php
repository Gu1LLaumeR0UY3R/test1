<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($titrePage ?? 'Cinéma') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand bg-dark" data-bs-theme="dark">
    <div class="container">
        <span class="navbar-brand">Cinéma</span>
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="index.php?route=listerFilms">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?route=listerRealisateurs">Réalisateurs</a></li>
        </ul>
    </div>
</nav>
<main class="container my-4">
