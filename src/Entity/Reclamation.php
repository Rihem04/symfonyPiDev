<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ReponseReclamation;


/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir l'email ")]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide.")]

    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="reported_email", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir reported email")]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide.")]
    private $reportedEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir le sujet de reclamation")]
    private $sujet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */

    private $date;
     
    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer", nullable=false)
     *  @Assert\Length(
    *     min=8,
    *     max=8,
    *     exactMessage="Le numéro de téléphone doit contenir exactement 8 chiffres"
    * )
     */
    #[Assert\NotBlank (message:"veuillez saisir le numéro de telephone ")]
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir le description de reclamation")]
    private $description;

    public function getIdreclamation(): ?int
    {
        return $this->idreclamation;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getReportedEmail(): ?string
    {
        return $this->reportedEmail;
    }

    public function setReportedEmail(string $reportedEmail): self
    {
        $this->reportedEmail = $reportedEmail;

        return $this;
    }
    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

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


}
