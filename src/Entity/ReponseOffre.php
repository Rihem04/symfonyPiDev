<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReponseOffre
 *
 * @ORM\Table(name="reponse_offre", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_406FFD0C2563DECF", columns={"id_demande_id"})})
 * @ORM\Entity
 */
class ReponseOffre
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
     * @ORM\Column(name="mail_demandeur", type="string", length=255, nullable=false)
     */
    private $mailDemandeur;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_freelance", type="string", length=255, nullable=false)
     */
    private $mailFreelance;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_details", type="string", length=255, nullable=false)
     */
    private $reponseDetails;

    /**
     * @var \Demande
     *
     * @ORM\ManyToOne(targetEntity="Demande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_demande_id", referencedColumnName="id")
     * })
     */
    private $idDemande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailDemandeur(): ?string
    {
        return $this->mailDemandeur;
    }

    public function setMailDemandeur(string $mailDemandeur): self
    {
        $this->mailDemandeur = $mailDemandeur;

        return $this;
    }

    public function getMailFreelance(): ?string
    {
        return $this->mailFreelance;
    }

    public function setMailFreelance(string $mailFreelance): self
    {
        $this->mailFreelance = $mailFreelance;

        return $this;
    }

    public function getReponseDetails(): ?string
    {
        return $this->reponseDetails;
    }

    public function setReponseDetails(string $reponseDetails): self
    {
        $this->reponseDetails = $reponseDetails;

        return $this;
    }

    public function getIdDemande(): ?Demande
    {
        return $this->idDemande;
    }

    public function setIdDemande(?Demande $idDemande): self
    {
        $this->idDemande = $idDemande;

        return $this;
    }


}
