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


}
