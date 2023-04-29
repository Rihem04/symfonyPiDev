<?php

namespace App\Entity;

use App\Repository\DemandeClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use symfony\component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DemandeClientRepository::class)]
class DemandeClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    #[Assert\Type(type: "alpha")]
    #[Assert\NotBlank(message: 'le chmps ne doit être vide')]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Your description must be at least {{ limit }} characters long',
        maxMessage: 'Your description cannot be longer than {{ limit }} characters',
    )]
    private  $titre = null;



    #[ORM\Column(length: 255)]
    #[Assert\Type(type: "alpha")]
    #[Assert\NotBlank(message: 'le chmps ne doit être vide')]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Your description must be at least {{ limit }} characters long',
        maxMessage: 'Your description cannot be longer than {{ limit }} characters',
    )]
    private  $description = null;


    #[ORM\Column(length: 255)]
    #[Assert\Type(type: "alpha")]
    #[Assert\NotBlank(message: 'le chmps ne doit être vide')]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Your description must be at least {{ limit }} characters long',
        maxMessage: 'Your description cannot be longer than {{ limit }} characters',
    )]
    private  $competence = null;

    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank(message: 'le chmps ne doit être vide')]
    #[Assert\Positive(message: 'le prix ne peut être négatif')]

    private  $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateLimite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\ManyToOne(inversedBy: 'demandeClients')]
    private ?User $idClient = null;

    #[ORM\Column]
    private ?int $idFreelance = null;

    #[ORM\OneToOne(mappedBy: 'id_demande', cascade: ['persist', 'remove'])]
    private ?OffreDemande $offreDemande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }
    public function __toString()
    {
        return $this->getId();
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

    public function getCompetence(): ?string
    {
        return $this->competence;
    }

    public function setCompetence(string $competence): self
    {
        $this->competence = $competence;

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

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->dateLimite;
    }

    public function setDateLimite(\DateTimeInterface $dateLimite): self
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getIdClient(): ?User
    {
        return $this->idClient;
    }

    public function setIdClient(?User $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdFreelance(): ?int
    {
        return $this->idFreelance;
    }

    public function setIdFreelance(int $idFreelance): self
    {
        $this->idFreelance = $idFreelance;

        return $this;
    }

    public function getOffreDemande(): ?OffreDemande
    {
        return $this->offreDemande;
    }

    public function setOffreDemande(?OffreDemande $offreDemande): self
    {
        // unset the owning side of the relation if necessary
        if ($offreDemande === null && $this->offreDemande !== null) {
            $this->offreDemande->setIdDemande(null);
        }

        // set the owning side of the relation if necessary
        if ($offreDemande !== null && $offreDemande->getIdDemande() !== $this) {
            $offreDemande->setIdDemande($this);
        }

        $this->offreDemande = $offreDemande;

        return $this;
    }
}
