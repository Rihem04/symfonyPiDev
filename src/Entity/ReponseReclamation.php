<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReponseReclamation
 *
 * @ORM\Table(name="reponse_reclamation", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_C7CB5101100D1FDF", columns={"id_reclamation_id"})})
 * @ORM\Entity
 */
class ReponseReclamation
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
     * @ORM\Column(name="traitement", type="string", length=255, nullable=false)
     */
    private $traitement;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_reponse", type="string", length=255, nullable=false)
     */
    private $contenuReponse;

    /**
     * @var \Reclamation
     *
     * @ORM\ManyToOne(targetEntity="Reclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reclamation_id", referencedColumnName="id")
     * })
     */
    private $idReclamation;


}
