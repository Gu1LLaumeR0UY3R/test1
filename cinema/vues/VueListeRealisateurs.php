<?php $titrePage = 'Réalisateurs'; include __DIR__ . '/inc_haut.php'; ?>

<h1 class="h3 mb-3">Liste des réalisateurs</h1>

<table class="table table-striped">
    <thead>
        <tr><th>ID</th><th>Nom</th><th>Prénom</th></tr>
    </thead>
    <tbody>
        <?php foreach ($realisateurs as $r): ?>
            <tr>
                <td><?= $r->id ?></td>
                <td><a href="index.php?route=voirRealisateur&id=<?= $r->id ?>"><?= e($r->nom) ?></a></td>
                <td><?= e($r->prenom) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/inc_bas.php'; ?>
