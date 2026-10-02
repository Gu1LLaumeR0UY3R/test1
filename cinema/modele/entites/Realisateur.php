<?php

class Realisateur
{
    public function __construct(
        public readonly int $id,
        public readonly string $nom,
        public readonly string $prenom,
        public readonly string $nationalite
    ) {}
}
