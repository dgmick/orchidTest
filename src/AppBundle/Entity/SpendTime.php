<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SpendTime
 *
 * @ORM\Table(name="spend_time")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SpendTimeRepository")
 */
class SpendTime
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
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=10)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="contries", type="string", length=25)
     */
    private $contries;

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="string", length=25)
     */
    private $time;


  
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
     * Set contries
     *
     * @param string $contries
     *
     * @return SpendTime
     */
    public function setContries($contries)
    {
        $this->contries = $contries;

        return $this;
    }

    /**
     * Get contries
     *
     * @return string
     */
    public function getContries()
    {
        return $this->contries;
    }

    /**
     * Set time
     *
     * @param string $time
     *
     * @return SpendTime
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return SpendTime
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }
}
