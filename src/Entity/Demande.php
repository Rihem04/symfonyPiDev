<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $compétence = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_creation_demande = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_limite = null;

    #[ORM\Column]
    private ?int $id_freelance = null;

    #[ORM\ManyToOne(inversedBy: 'demandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $id_client = null;

    #[ORM\OneToOne(mappedBy: 'id_demande', cascade: ['persist', 'remove'])]
    private ?ReponseOffre $reponseOffre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCompétence(): ?string
    {
        return $this->compétence;
    }

    public function setCompétence(string $compétence): self
    {
        $this->compétence = $compétence;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDateCreationDemande(): ?\DateTimeInterface
    {
        return $this->date_creation_demande;
    }

    public function setDateCreationDemande(\DateTimeInterface $date_creation_demande): self
    {
        $this->date_creation_demande = $date_creation_demande;

        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->date_limite;
    }

    public function setDateLimite(\DateTimeInterface $date_limite): self
    {
        $this->date_limite = $date_limite;

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

    public function getIdClient(): ?user
    {
        return $this->id_client;
    }

    public function setIdClient(?user $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getReponseOffre(): ?ReponseOffre
    {
        return $this->reponseOffre;
    }

    public function setReponseOffre(ReponseOffre $reponseOffre): self
    {
        // set the owning side of the relation if necessary
        if ($reponseOffre->getIdDemande() !== $this) {
            $reponseOffre->setIdDemande($this);
        }

        $this->reponseOffre = $reponseOffre;

        return $this;
    }
}
