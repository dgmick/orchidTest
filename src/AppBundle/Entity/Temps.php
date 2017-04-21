<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temps
 *
 * @ORM\Table(name="temps")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TempsRepository")
 */
class Temps
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *@ORM\OneToOne(targetEntity="Temps")
     * @ORM\Column(name="Temps", type="integer", length=25)
     */
    private $temps;


    /**
     * @var int
     *
     * @ORM\Column(name="TempLibre", type="integer", length=25 , nullable=true)
     */
    private $TempLibre;

    

    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set temps
     *
     * @param string $temps
     *
     * @return Temps
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return string
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set tempLibre
     *
     * @param string $tempLibre
     *
     * @return Temps
     */
    public function setTempLibre($tempLibre)
    {
        $this->TempLibre = $tempLibre;

        return $this;
    }

    /**
     * Get tempLibre
     *
     * @return string
     */
    public function getTempLibre()
    {
        return $this->TempLibre;
    }


    public function __toString()
    {
        return $this->getTemps();
    }
}
