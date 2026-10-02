<?php $titrePage = $film->nom; include __DIR__ . '/inc_haut.php'; ?>

<h1 class="h3 mb-3"><?= e($film->nom) ?></h1>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Année :</strong> <?= $film->anneeSortie ?></li>
    <li class="list-group-item">
        <strong>Réalisateur :</strong>
        <a href="index.php?route=voirRealisateur&id=<?= $film->realisateur->id ?>">
            <?= e($film->realisateur->prenom) ?> <?= e($film->realisateur->nom) ?>
        </a>
    </li>
    <li class="list-group-item"><strong>Nationalité :</strong> <?= e($film->realisateur->nationalite) ?></li>
</ul>

<a href="index.php?route=listerFilms" class="btn btn-secondary">Retour aux films</a>

<?php include __DIR__ . '/inc_bas.php'; ?>
