<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ReponseReclamation
 *
 * @ORM\Table(name="reponse_reclamation", indexes={@ORM\Index(name="idReclamation", columns={"idReclamation"})})
 * @ORM\Entity
 */
class ReponseReclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreponse;

    /**
     * @var string
     *
     * @ORM\Column(name="traitement", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir le traitement ")]
    private $traitement;

    /**
     * @var string
     *
     * @ORM\Column(name="contenue_reponse", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir le contenue de reponse ")]
    private $contenueReponse;

    /**
     * @var \Reclamation
     *
     * @ORM\ManyToOne(targetEntity="Reclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idReclamation", referencedColumnName="idReclamation")
     * })
     */
    #[Assert\NotBlank (message:"veuillez saisir id de reclamation ")]
    private $idreclamation;

    public function getIdreponse(): ?int
    {
        return $this->idreponse;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(string $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getContenueReponse(): ?string
    {
        return $this->contenueReponse;
    }

    public function setContenueReponse(string $contenueReponse): self
    {
        $this->contenueReponse = $contenueReponse;

        return $this;
    }

    public function getIdreclamation(): ?Reclamation
    {
        return $this->idreclamation;
    }

    public function setIdreclamation(?Reclamation $idreclamation): self
    {
        $this->idreclamation = $idreclamation;

        return $this;
    }


}
