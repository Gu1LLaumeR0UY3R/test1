<?php

class DAORealisateur
{
    public function __construct(private PDO $pdo) {}

    /** @return Realisateur[] */
    public function findAll(): array
    {
        $req = $this->pdo->query("SELECT id, nom, prenom, nationalite FROM realisateur ORDER BY nom, prenom");
        return array_map(fn($ligne) => $this->hydrater($ligne), $req->fetchAll());
    }

    public function findById(int $id): ?Realisateur
    {
        $req = $this->pdo->prepare("SELECT id, nom, prenom, nationalite FROM realisateur WHERE id = :id");
        $req->execute([':id' => $id]);
        $ligne = $req->fetch();
        return $ligne ? $this->hydrater($ligne) : null;
    }

    // Transforme une ligne SQL en entité
    private function hydrater(array $ligne): Realisateur
    {
        return new Realisateur(
            (int) $ligne['id'],
            $ligne['nom'],
            $ligne['prenom'],
            $ligne['nationalite']
        );
    }
}
