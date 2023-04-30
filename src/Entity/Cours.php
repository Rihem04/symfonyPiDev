<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="cours_name", type="string", length=255, nullable=false)
     */
    private $coursName;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_tuteur", type="string", length=255, nullable=false)
     */
    private $nomTuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="occurence", type="integer", nullable=false)
     */
    private $occurence;

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
        return $this->coursName;
    }

    public function setCoursName(string $coursName): self
    {
        $this->coursName = $coursName;

        return $this;
    }

    public function getNomTuteur(): ?string
    {
        return $this->nomTuteur;
    }

    public function setNomTuteur(string $nomTuteur): self
    {
        $this->nomTuteur = $nomTuteur;

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


}
