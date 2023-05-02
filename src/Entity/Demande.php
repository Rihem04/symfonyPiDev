<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="IDX_2694D7A599DED506", columns={"id_client_id"})})
 * @ORM\Entity
 */
class Demande
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
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="compétence", type="string", length=255, nullable=false)
     */
    private $compétence;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_demande", type="datetime", nullable=false)
     */
    private $dateCreationDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_limite", type="date", nullable=false)
     */
    private $dateLimite;

    /**
     * @var int
     *
     * @ORM\Column(name="id_freelance", type="integer", nullable=false)
     */
    private $idFreelance;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client_id", referencedColumnName="id_user")
     * })
     */
    private $idClient;


}
