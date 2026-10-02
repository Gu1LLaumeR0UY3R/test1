<?php

class DAOFilm
{
    // Requête de base : un film + son réalisateur (une seule requête grâce au JOIN)
    private const SELECT = "SELECT f.id, f.nom, f.annee_sortie,
                                   r.id AS rea_id, r.nom AS rea_nom,
                                   r.prenom AS rea_prenom, r.nationalite AS rea_nationalite
                            FROM film f
                            INNER JOIN realisateur r ON r.id = f.fkidRea";

    public function __construct(private PDO $pdo) {}

    /** @return Film[] */
    public function findAll(): array
    {
        $req = $this->pdo->query(self::SELECT . " ORDER BY f.nom");
        return array_map(fn($ligne) => $this->hydrater($ligne), $req->fetchAll());
    }

    public function findById(int $id): ?Film
    {
        $req = $this->pdo->prepare(self::SELECT . " WHERE f.id = :id");
        $req->execute([':id' => $id]);
        $ligne = $req->fetch();
        return $ligne ? $this->hydrater($ligne) : null;
    }

    /** @return Film[] */
    public function findByRealisateur(int $idRealisateur): array
    {
        $req = $this->pdo->prepare(self::SELECT . " WHERE f.fkidRea = :idRea ORDER BY f.annee_sortie");
        $req->execute([':idRea' => $idRealisateur]);
        return array_map(fn($ligne) => $this->hydrater($ligne), $req->fetchAll());
    }

    // Transforme une ligne SQL en entité Film (avec son Realisateur)
    private function hydrater(array $ligne): Film
    {
        $realisateur = new Realisateur(
            (int) $ligne['rea_id'],
            $ligne['rea_nom'],
            $ligne['rea_prenom'],
            $ligne['rea_nationalite']
        );

        return new Film(
            (int) $ligne['id'],
            $ligne['nom'],
            (int) $ligne['annee_sortie'],
            $realisateur
        );
    }
}
