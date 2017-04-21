<?php

namespace AppBundle\Entity;

use AppBundle\Repository\PosteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Historique_employer
 *
 * @ORM\Table(name="historique_employer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Historique_employerRepository")
 */
class Historique_employer 
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
     * @ORM\OneToOne(targetEntity="Poste" ,cascade={"persist"})
     */
    private $poste;


    /**
     * @var City
     * @ORM\OneToOne(targetEntity="City",cascade={"persist"})
     */
    private $city;


    /**
     * @var Temps
     * @ORM\OneToOne(targetEntity="Temps",cascade={"persist"})
     */
    private $temps;
    

    /**
     * @var Employer
     * @ORM\OneToOne(targetEntity="Employer",cascade={"persist"})
     */
    private $employer;

    




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
     * @return Employer
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * @param Employer $employer
     */
    public function setEmployer($employer)
    {
        $this->employer = $employer;
    }

    /**
     * @return Temps
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * @param Temps $temps
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param City $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return Poste
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * @param Poste $poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }
}
