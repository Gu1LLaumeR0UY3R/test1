<?php

namespace App\Entity;

use App\Repository\ContributionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContributionRepository::class)]
#[ORM\Table(name: 'contribution')]
#[ORM\UniqueConstraint(name: 'uq_contribution_appel_membre', columns: ['appel_id', 'membre_id'])]
class Contribution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: AppelContribution::class, inversedBy: 'contributions')]
    #[ORM\JoinColumn(name: 'appel_id', referencedColumnName: 'id', nullable: false)]
    private ?AppelContribution $appel = null;

    #[ORM\ManyToOne(targetEntity: Membre::class, inversedBy: 'contributions')]
    #[ORM\JoinColumn(name: 'membre_id', referencedColumnName: 'id', nullable: false)]
    private ?Membre $membre = null;

    #[ORM\Column(type: 'integer')]
    private ?int $montant_centimes = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $payee_le = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppel(): ?AppelContribution
    {
        return $this->appel;
    }

    public function setAppel(?AppelContribution $appel): static
    {
        $this->appel = $appel;
        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): static
    {
        $this->membre = $membre;
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

    public function getPayeeLe(): ?\DateTimeInterface
    {
        return $this->payee_le;
    }

    public function setPayeeLe(?\DateTimeInterface $payee_le): static
    {
        $this->payee_le = $payee_le;
        return $this;
    }
}