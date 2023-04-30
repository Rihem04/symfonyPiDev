<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEvenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevenement;

      /**
     * 
     * @ORM\Column(length=1000)
     * 
     */
    #[Assert\NotBlank (message:"veuillez saisir l'image du l'evenement ")]
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_event", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir le lieu du l'evenement correcte !")]
    private $lieuEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_event", type="date", nullable=false)
     * @Assert\GreaterThan("today", message="La date de l'événement doit être ultérieure à aujourd'hui.")
     */
    #[Assert\NotBlank (message:"veuillez saisir le date du l'evenement ")]
    
    private $dateEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir le rate du l'evenement ")]
    #[Assert\Length(min:3)]
    #[Assert\Length(max:10)]
    private $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="description_event", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank (message:"veuillez saisir le description du l'evenement ")]
    #[Assert\Length(min:3)]
    #[Assert\Length(max:200)]
    private $descriptionEvent;
    
    
   

    public function getIdevenement(): ?int
    {
        return $this->idevenement;
    }
  
    

    public function getImage()
    {
        return $this->image;
    }

    public function setImage( $image)
    {
        $this->image = $image;

        return $this;
    }

    public function getLieuEvent(): ?string
    {
        return $this->lieuEvent;
    }

    public function setLieuEvent(string $lieuEvent): self
    {
        $this->lieuEvent = $lieuEvent;

        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->dateEvent;
    }

    public function setDateEvent(\DateTimeInterface $dateEvent): self
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(string $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getDescriptionEvent(): ?string
    {
        return $this->descriptionEvent;
    }

    public function setDescriptionEvent(string $descriptionEvent): self
    {
        $this->descriptionEvent = $descriptionEvent;

        return $this;
    }
    


}
