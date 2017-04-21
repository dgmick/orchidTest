<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poste
 *
 * @ORM\Table(name="poste")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PosteRepository")
 */
class Poste
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
     * @var Poste
     * 
     * @ORM\Column(name="Poste", type="string", length=255)
     */
    private $poste;



    /**
     *  @var City
     * @ORM\ManyToOne(targetEntity="City", cascade={"persist"} )
     */
    private $city;


    /**
     * @var Employer
     *
     * @ORM\OneToOne(targetEntity="Employer" , cascade={"persist"})
     * @ORM\JoinColumn(name="employer_id", referencedColumnName="id")
     *
     */
    private $employer;


    /**
     * @var Temps
     *
     * @ORM\OneToOne(targetEntity="Temps" , cascade={"persist"})
     */
    private $temps;

    




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
     * Set poste
     *
     * @param string $poste
     *
     * @return Poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }
    
    public function __toString()
    {
        return (string) $this->getPoste();
    }
    

    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Poste
     */
    public function setCity(\AppBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set employer
     *
     * @param \AppBundle\Entity\Employer $employer
     *
     * @return Poste
     */
    public function setEmployer(\AppBundle\Entity\Employer $employer = null)
    {
        $this->employer = $employer;

        return $this;
    }

    /**
     * Get employer
     *
     * @return \AppBundle\Entity\Employer
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * Set temps
     *
     * @param \AppBundle\Entity\Temps $temps
     *
     * @return Poste
     */
    public function setTemps(\AppBundle\Entity\Temps $temps = null)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return \AppBundle\Entity\Temps
     */
    public function getTemps()
    {
        return $this->temps;
    }
}
