<?php

namespace App\Entity;

use App\Repository\ReponseOffreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseOffreRepository::class)]
class ReponseOffre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mail_demandeur = null;

    #[ORM\Column(length: 255)]
    private ?string $mail_freelance = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse_details = null;

    #[ORM\OneToOne(inversedBy: 'reponseOffre', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?demande $id_demande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailDemandeur(): ?string
    {
        return $this->mail_demandeur;
    }

    public function setMailDemandeur(string $mail_demandeur): self
    {
        $this->mail_demandeur = $mail_demandeur;

        return $this;
    }

    public function getMailFreelance(): ?string
    {
        return $this->mail_freelance;
    }

    public function setMailFreelance(string $mail_freelance): self
    {
        $this->mail_freelance = $mail_freelance;

        return $this;
    }

    public function getReponseDetails(): ?string
    {
        return $this->reponse_details;
    }

    public function setReponseDetails(string $reponse_details): self
    {
        $this->reponse_details = $reponse_details;

        return $this;
    }

    public function getIdDemande(): ?demande
    {
        return $this->id_demande;
    }

    public function setIdDemande(demande $id_demande): self
    {
        $this->id_demande = $id_demande;

        return $this;
    }
}
