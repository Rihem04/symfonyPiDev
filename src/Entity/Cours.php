<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    #[ORM\Column(length: 255)]
    private ?string $cours_name = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_tuteur = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $occurence = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $id_user = null;

    #[ORM\OneToOne(mappedBy: 'id_cours', cascade: ['persist', 'remove'])]
    private ?Test $test = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCoursName(): ?string
    {
        return $this->cours_name;
    }

    public function setCoursName(string $cours_name): self
    {
        $this->cours_name = $cours_name;

        return $this;
    }

    public function getNomTuteur(): ?string
    {
        return $this->nom_tuteur;
    }

    public function setNomTuteur(string $nom_tuteur): self
    {
        $this->nom_tuteur = $nom_tuteur;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getOccurence(): ?int
    {
        return $this->occurence;
    }

    public function setOccurence(int $occurence): self
    {
        $this->occurence = $occurence;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(Test $test): self
    {
        // set the owning side of the relation if necessary
        if ($test->getIdCours() !== $this) {
            $test->setIdCours($this);
        }

        $this->test = $test;

        return $this;
    }
}
