<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employer
 *
 * @ORM\Table(name="employer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployerRepository")
 */
class Employer
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
     *
     * @ORM\Column(name="Employer", type="string", length=50)
     */
    private $employer;


    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=50  , nullable=true)
     */
    private $email;


    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=50, nullable=true)
     *
     */
    private $prenom;



    /**
     * @var City
     * @ORM\ManyToOne(targetEntity="City",cascade={"persist"})
     * 
     */
    private $city;


    /**
     * @var Poste
     *
     * @ORM\ManyToOne(targetEntity="Poste",  cascade={"persist"})
     */
    private $poste;



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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set employer
     *
     * @param string $employer
     *
     * @return Employer
     */
    public function setEmployer($employer)
    {
        $this->employer = $employer;

        return $this;
    }

    /**
     * Get employer
     *
     * @return string
     */
    public function getEmployer()
    {
        return $this->employer;
    }

   

  

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Employer
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }


    public function __toString()
    {
        return $this->getEmployer();
    }



    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Employer
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
     * Set poste
     *
     * @param \AppBundle\Entity\Poste $poste
     *
     * @return Employer
     */
    public function setPoste(\AppBundle\Entity\Poste $poste = null)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return \AppBundle\Entity\Poste
     */
    public function getPoste()
    {
        return $this->poste;
    }
}
