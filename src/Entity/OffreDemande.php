<?php

namespace App\Entity;

use App\Repository\OffreDemandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreDemandeRepository::class)]
class OffreDemande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reponseDemande = null;

    #[ORM\Column]
    private ?int $id_freelance = null;

    #[ORM\OneToOne(inversedBy: 'offreDemande', cascade: ['persist', 'remove'])]
    private ?DemandeClient $id_demande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReponseDemande(): ?string
    {
        return $this->reponseDemande;
    }

    public function setReponseDemande(string $reponseDemande): self
    {
        $this->reponseDemande = $reponseDemande;

        return $this;
    }

    public function getIdFreelance(): ?int
    {
        return $this->id_freelance;
    }

    public function setIdFreelance(int $id_freelance): self
    {
        $this->id_freelance = $id_freelance;
        return $this;
    }

    public function __toString()
    {
        return $this->id_demande;
    }

    public function getIdDemande(): ?DemandeClient
    {
        return $this->id_demande;
    }

    public function setIdDemande(?DemandeClient $id_demande): self
    {
        $this->id_demande = $id_demande;

        return $this;
    }
}
