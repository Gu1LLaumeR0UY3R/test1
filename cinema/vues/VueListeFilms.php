<?php $titrePage = 'Films'; include __DIR__ . '/inc_haut.php'; ?>

<h1 class="h3 mb-3">Liste des films</h1>

<table class="table table-striped">
    <thead>
        <tr><th>ID</th><th>Titre</th></tr>
    </thead>
    <tbody>
        <?php foreach ($films as $film): ?>
            <tr>
                <td><?= $film->id ?></td>
                <td><a href="index.php?route=voirFilm&id=<?= $film->id ?>"><?= e($film->nom) ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/inc_bas.php'; ?>
