<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'membre')]
class Membre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Groupe::class, inversedBy: 'membres')]
    #[ORM\JoinColumn(name: 'groupe_id', referencedColumnName: 'id', nullable: false)]
    private ?Groupe $groupe = null;

    #[ORM\Column(type: 'string', length: 120)]
    private ?string $nom = null;

    #[ORM\Column(type: 'string', length: 180, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: 'boolean')]
    private ?bool $actif = true;

    #[ORM\OneToMany(mappedBy: 'membre', targetEntity: Contribution::class, cascade: ['persist', 'remove'])]
    private Collection $contributions;

    #[ORM\OneToMany(mappedBy: 'debiteur', targetEntity: Dette::class, cascade: ['persist', 'remove'])]
    private Collection $dettes;

    public function __construct()
    {
        $this->contributions = new ArrayCollection();
        $this->dettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): static
    {
        $this->groupe = $groupe;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): static
    {
        $this->actif = $actif;
        return $this;
    }

    /**
     * @return Collection<int, Contribution>
     */
    public function getContributions(): Collection
    {
        return $this->contributions;
    }

    public function addContribution(Contribution $contribution): static
    {
        if (!$this->contributions->contains($contribution)) {
            $this->contributions->add($contribution);
            $contribution->setMembre($this);
        }
        return $this;
    }

    public function removeContribution(Contribution $contribution): static
    {
        if ($this->contributions->removeElement($contribution)) {
            if ($contribution->getMembre() === $this) {
                $contribution->setMembre(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Dette>
     */
    public function getDettes(): Collection
    {
        return $this->dettes;
    }

    public function addDette(Dette $dette): static
    {
        if (!$this->dettes->contains($dette)) {
            $this->dettes->add($dette);
            $dette->setDebiteur($this);
        }
        return $this;
    }

    public function removeDette(Dette $dette): static
    {
        if ($this->dettes->removeElement($dette)) {
            if ($dette->getDebiteur() === $this) {
                $dette->setDebiteur(null);
            }
        }
        return $this;
    }
}