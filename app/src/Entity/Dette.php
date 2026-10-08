<?php

namespace App\Entity;

use App\Repository\DetteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Table(name: 'dette')]
#[ORM\UniqueConstraint(name: 'uq_dette_depense_debiteur', columns: ['depense_id', 'debiteur_id'])]
class Dette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Depense::class, inversedBy: 'dettes')]
    #[ORM\JoinColumn(name: 'depense_id', referencedColumnName: 'id', nullable: false)]
    private ?Depense $depense = null;

    #[ORM\ManyToOne(targetEntity: Membre::class, inversedBy: 'dettes')]
    #[ORM\JoinColumn(name: 'debiteur_id', referencedColumnName: 'id', nullable: false)]
    private ?Membre $debiteur = null;

    #[ORM\Column(type: 'integer')]
    private ?int $montant_centimes = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $payee_le = null;

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

    public function getDebiteur(): ?Membre
    {
        return $this->debiteur;
    }

    public function setDebiteur(?Membre $debiteur): static
    {
        $this->debiteur = $debiteur;
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