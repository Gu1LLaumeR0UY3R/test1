<?php

class ControleurRealisateur
{
    private DAORealisateur $daoRealisateur;
    private DAOFilm $daoFilm;

    public function __construct(PDO $pdo)
    {
        $this->daoRealisateur = new DAORealisateur($pdo);
        $this->daoFilm        = new DAOFilm($pdo);
    }

    // Page des réalisateurs
    public function listerRealisateurs(): void
    {
        $realisateurs = $this->daoRealisateur->findAll();
        include __DIR__ . '/../vues/VueListeRealisateurs.php';
    }

    // Détail : index.php?route=voirRealisateur&id=2
    public function voirRealisateur(): void
    {
        $id          = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $realisateur = $id ? $this->daoRealisateur->findById($id) : null;

        if ($realisateur === null) {
            http_response_code(404);
            include __DIR__ . '/../vues/VueErreur404.php';
            return;
        }

        $films = $this->daoFilm->findByRealisateur($realisateur->id);
        include __DIR__ . '/../vues/VueDetailRealisateur.php';
    }
}
