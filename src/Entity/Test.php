<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_D87F7E0C2E149425", columns={"id_cours_id"})})
 * @ORM\Entity
 */
class Test
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
     * @var string|null
     *
     * @ORM\Column(name="contenu_test", type="string", length=255, nullable=true)
     */
    private $contenuTest;

    /**
     * @var string
     *
     * @ORM\Column(name="test_name", type="string", length=255, nullable=false)
     */
    private $testName;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=10, scale=0, nullable=false)
     */
    private $note;

    /**
     * @var \Cours
     *
     * @ORM\ManyToOne(targetEntity="Cours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cours_id", referencedColumnName="id")
     * })
     */
    private $idCours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenuTest(): ?string
    {
        return $this->contenuTest;
    }

    public function setContenuTest(?string $contenuTest): self
    {
        $this->contenuTest = $contenuTest;

        return $this;
    }

    public function getTestName(): ?string
    {
        return $this->testName;
    }

    public function setTestName(string $testName): self
    {
        $this->testName = $testName;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIdCours(): ?Cours
    {
        return $this->idCours;
    }

    public function setIdCours(?Cours $idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }


}
