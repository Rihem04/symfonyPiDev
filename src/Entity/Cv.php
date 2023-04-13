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
     * @ORM\Column(name="competances", type="string", length=255, nullable=false)
     */
    private $competances;

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
     *   @ORM\JoinColumn(name="id_user_id", referencedColumnName="id_user")
     * })
     */
    private $idUser;


}
