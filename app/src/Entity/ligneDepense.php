<?php

namespace App\Entity;

use App\Repository\LigneDepenseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneDepenseRepository::class)]
#[ORM\Table(name: 'ligne_depense')]
class LigneDepense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Depense::class, inversedBy: 'ligneDepenses')]
    #[ORM\JoinColumn(name: 'depense_id', referencedColumnName: 'id', nullable: false)]
    private ?Depense $depense = null;

    #[ORM\Column(type: 'string', length: 160)]
    private ?string $libelle = null;

    #[ORM\Column(type: 'integer')]
    private ?int $quantite = 1;

    #[ORM\Column(type: 'integer')]
    private ?int $montant_centimes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepense(): ?Depense
    {
        return $this->depense;
    }

    public function setDepense(?Depense $depense): static
    {
        $this->depense = $depense;
        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getMontantCentimes(): ?int
    {
        return $this->montant_centimes;
    }

    public function setMontantCentimes(int $montant_centimes): static
    {
        $this->montant_centimes = $montant_centimes;
        return $this;
    }
}