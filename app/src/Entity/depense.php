<?php

namespace App\Entity;

use App\Repository\DepenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepenseRepository::class)]
#[ORM\Table(name: 'depense')]
class Depense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Groupe::class, inversedBy: 'depenses')]
    #[ORM\JoinColumn(name: 'groupe_id', referencedColumnName: 'id', nullable: false)]
    private ?Groupe $groupe = null;

    #[ORM\ManyToOne(targetEntity: Membre::class)]
    #[ORM\JoinColumn(name: 'paye_par_id', referencedColumnName: 'id', nullable: false)]
    private ?Membre $paye_par = null;

    #[ORM\Column(type: 'string', length: 120, nullable: true)]
    private ?string $magasin = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $depensee_le = null;

    #[ORM\Column(type: 'integer')]
    private ?int $total_centimes = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $remboursee_le = null;

    #[ORM\OneToMany(mappedBy: 'depense', targetEntity: LigneDepense::class, cascade: ['persist', 'remove'])]
    private Collection $ligneDepenses;

    #[ORM\OneToMany(mappedBy: 'depense', targetEntity: Dette::class, cascade: ['persist', 'remove'])]
    private Collection $dettes;

    public function __construct()
    {
        $this->ligneDepenses = new ArrayCollection();
        $this->dettes = new ArrayCollection();
        $this->depensee_le = new \DateTimeImmutable();
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

    public function getPayePar(): ?Membre
    {
        return $this->paye_par;
    }

    public function setPayePar(?Membre $paye_par): static
    {
        $this->paye_par = $paye_par;
        return $this;
    }

    public function getMagasin(): ?string
    {
        return $this->magasin;
    }

    public function setMagasin(?string $magasin): static
    {
        $this->magasin = $magasin;
        return $this;
    }

    public function getDepenseeLe(): ?\DateTimeInterface
    {
        return $this->depensee_le;
    }

    public function setDepenseeLe(\DateTimeInterface $depensee_le): static
    {
        $this->depensee_le = $depensee_le;
        return $this;
    }

    public function getTotalCentimes(): ?int
    {
        return $this->total_centimes;
    }

    public function setTotalCentimes(int $total_centimes): static
    {
        $this->total_centimes = $total_centimes;
        return $this;
    }

    public function getRembourseeLe(): ?\DateTimeInterface
    {
        return $this->remboursee_le;
    }

    public function setRembourseeLe(?\DateTimeInterface $remboursee_le): static
    {
        $this->remboursee_le = $remboursee_le;
        return $this;
    }

    /**
     * @return Collection<int, LigneDepense>
     */
    public function getLigneDepenses(): Collection
    {
        return $this->ligneDepenses;
    }

    public function addLigneDepense(LigneDepense $ligneDepense): static
    {
        if (!$this->ligneDepenses->contains($ligneDepense)) {
            $this->ligneDepenses->add($ligneDepense);
            $ligneDepense->setDepense($this);
        }
        return $this;
    }

    public function removeLigneDepense(LigneDepense $ligneDepense): static
    {
        if ($this->ligneDepenses->removeElement($ligneDepense)) {
            if ($ligneDepense->getDepense() === $this) {
                $ligneDepense->setDepense(null);
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
            $dette->setDepense($this);
        }
        return $this;
    }

    public function removeDette(Dette $dette): static
    {
        if ($this->dettes->removeElement($dette)) {
            if ($dette->getDepense() === $this) {
                $dette->setDepense(null);
            }
        }
        return $this;
    }
}