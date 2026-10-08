<?php

namespace App\Entity;

use App\Repository\AppelContributionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppelContributionRepository::class)]
#[ORM\Table(name: 'appel_contribution')]
class AppelContribution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Groupe::class, inversedBy: 'appelContributions')]
    #[ORM\JoinColumn(name: 'groupe_id', referencedColumnName: 'id', nullable: false)]
    private ?Groupe $groupe = null;

    #[ORM\Column(type: 'string', length: 160)]
    private ?string $titre = null;

    #[ORM\Column(type: 'integer')]
    private ?int $montant_par_membre_centimes = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_limite = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $cree_le = null;

    #[ORM\OneToMany(mappedBy: 'appel', targetEntity: Contribution::class, cascade: ['persist', 'remove'])]
    private Collection $contributions;

    public function __construct()
    {
        $this->contributions = new ArrayCollection();
        $this->cree_le = new \DateTimeImmutable();
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
        return $this;
    }

    public function getMontantParMembreCentimes(): ?int
    {
        return $this->montant_par_membre_centimes;
    }

    public function setMontantParMembreCentimes(int $montant_par_membre_centimes): static
    {
        $this->montant_par_membre_centimes = $montant_par_membre_centimes;
        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->date_limite;
    }

    public function setDateLimite(?\DateTimeInterface $date_limite): static
    {
        $this->date_limite = $date_limite;
        return $this;
    }

    public function getCreeLe(): ?\DateTimeInterface
    {
        return $this->cree_le;
    }

    public function setCreeLe(\DateTimeInterface $cree_le): static
    {
        $this->cree_le = $cree_le;
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
            $contribution->setAppel($this);
        }
        return $this;
    }

    public function removeContribution(Contribution $contribution): static
    {
        if ($this->contributions->removeElement($contribution)) {
            if ($contribution->getAppel() === $this) {
                $contribution->setAppel(null);
            }
        }
        return $this;
    }
}