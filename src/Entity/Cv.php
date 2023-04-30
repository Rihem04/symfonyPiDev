<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cv
 *
 * @ORM\Table(name="cv", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_B66FFE9279F37AE5", columns={"id_user_id"})})
 * @ORM\Entity
 */
class Cv
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
     * @ORM\Column(name="compétances", type="string", length=255, nullable=false)
     */
    private $compétances;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string", length=255, nullable=false)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255, nullable=false)
     */
    private $education;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_id", referencedColumnName="id")
     * })
     */
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompétances(): ?string
    {
        return $this->compétances;
    }

    public function setCompétances(string $compétances): self
    {
        $this->compétances = $compétances;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getEducation(): ?string
    {
        return $this->education;
    }

    public function setEducation(string $education): self
    {
        $this->education = $education;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
