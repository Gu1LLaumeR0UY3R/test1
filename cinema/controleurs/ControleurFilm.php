<?php

class ControleurFilm
{
    private DAOFilm $daoFilm;

    public function __construct(PDO $pdo)
    {
        $this->daoFilm = new DAOFilm($pdo);
    }

    // Accueil : liste des films
    public function listerFilms(): void
    {
        $films = $this->daoFilm->findAll();
        include __DIR__ . '/../vues/VueListeFilms.php';
    }

    // Détail d'un film : index.php?route=voirFilm&id=3
    public function voirFilm(): void
    {
        $id   = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $film = $id ? $this->daoFilm->findById($id) : null;

        if ($film === null) {
            http_response_code(404);
            include __DIR__ . '/../vues/VueErreur404.php';
            return;
        }

        include __DIR__ . '/../vues/VueDetailFilm.php';
    }
}
