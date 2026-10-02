<?php

class Film
{
    public function __construct(
        public readonly int $id,
        public readonly string $nom,
        public readonly int $anneeSortie,
        public readonly Realisateur $realisateur   // objet Realisateur, pas juste un id
    ) {}
}
