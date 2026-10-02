<?php $titrePage = $realisateur->prenom . ' ' . $realisateur->nom; include __DIR__ . '/inc_haut.php'; ?>

<h1 class="h3 mb-3"><?= e($realisateur->prenom) ?> <?= e($realisateur->nom) ?></h1>
<p><strong>Nationalité :</strong> <?= e($realisateur->nationalite) ?></p>

<h2 class="h5">Films</h2>
<ul class="list-group mb-3">
    <?php foreach ($films as $film): ?>
        <li class="list-group-item">
            <a href="index.php?route=voirFilm&id=<?= $film->id ?>"><?= e($film->nom) ?></a>
            (<?= $film->anneeSortie ?>)
        </li>
    <?php endforeach; ?>
</ul>

<a href="index.php?route=listerRealisateurs" class="btn btn-secondary">Retour aux réalisateurs</a>

<?php include __DIR__ . '/inc_bas.php'; ?>
