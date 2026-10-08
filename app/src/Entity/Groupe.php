<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
#[ORM\Table(name: 'groupe')]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 120)]
    private ?string $nom = null;

    #[ORM\Column(type: 'string', length: 20)]
    private ?string $mode = 'CAISSE';

    #[ORM\OneToOne(targetEntity: Utilisateur::class, inversedBy: 'groupe')]
    #[ORM\JoinColumn(name: 'proprietaire_id', referencedColumnName: 'id', nullable: false)]
    private ?Utilisateur $proprietaire = null;

    #[ORM\OneToMany(mappedBy: 'groupe', targetEntity: Membre::class, cascade: ['persist', 'remove'])]
    private Collection $membres;

    #[ORM\OneToMany(mappedBy: 'groupe', targetEntity: AppelContribution::class, cascade: ['persist', 'remove'])]
    private Collection $appelContributions;

    #[ORM\OneToMany(mappedBy: 'groupe', targetEntity: Depense::class, cascade: ['persist', 'remove'])]
    private Collection $depenses;

    public function __construct()
    {
        $this->membres = new ArrayCollection();
        $this->appelContributions = new ArrayCollection();
        $this->depenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): static
    {
        $this->mode = $mode;
        return $this;
    }

    public function getProprietaire(): ?Utilisateur
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Utilisateur $proprietaire): static
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    /**
     * @return Collection<int, Membre>
     */
    public function getMembres(): Collection
    {
        return $this->membres;
    }

    public function addMembre(Membre $membre): static
    {
        if (!$this->membres->contains($membre)) {
            $this->membres->add($membre);
            $membre->setGroupe($this);
        }
        return $this;
    }

    public function removeMembre(Membre $membre): static
    {
        if ($this->membres->removeElement($membre)) {
            if ($membre->getGroupe() === $this) {
                $membre->setGroupe(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, AppelContribution>
     */
    public function getAppelContributions(): Collection
    {
        return $this->appelContributions;
    }

    public function addAppelContribution(AppelContribution $appelContribution): static
    {
        if (!$this->appelContributions->contains($appelContribution)) {
            $this->appelContributions->add($appelContribution);
            $appelContribution->setGroupe($this);
        }
        return $this;
    }

    public function removeAppelContribution(AppelContribution $appelContribution): static
    {
        if ($this->appelContributions->removeElement($appelContribution)) {
            if ($appelContribution->getGroupe() === $this) {
                $appelContribution->setGroupe(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Depense>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depense $depense): static
    {
        if (!$this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setGroupe($this);
        }
        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depenses->removeElement($depense)) {
            if ($depense->getGroupe() === $this) {
                $depense->setGroupe(null);
            }
        }
        return $this;
    }
}