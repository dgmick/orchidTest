<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Revenues
 *
 * @ORM\Table(name="revenues")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RevenuesRepository")
 */
class Revenues
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
     * @ORM\Column(name="Sold", type="string", length=25)
     */
    private $sold;

    /**
     * @var string
     *
     * @ORM\Column(name="Spend", type="string", length=255)
     */
    private $spend;

    /**
     * @var string
     *
     * @ORM\Column(name="Remain", type="string", length=255)
     */
    private $remain;

    /**
     * @var string
     *
     * @ORM\Column(name="Revenu", type="decimal", length=25)
     */
    private $revenu;

    /**
     * @var string
     *
     * @ORM\Column(name="Costs", type="string", length=255)
     */
    private $costs;


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
     * Set sold
     *
     * @param string $sold
     *
     * @return Revenues
     */
    public function setSold($sold)
    {
        $this->sold = $sold;

        return $this;
    }

    /**
     * Get sold
     *
     * @return string
     */
    public function getSold()
    {
        return $this->sold;
    }

    /**
     * Set spend
     *
     * @param string $spend
     *
     * @return Revenues
     */
    public function setSpend($spend)
    {
        $this->spend = $spend;

        return $this;
    }

    /**
     * Get spend
     *
     * @return string
     */
    public function getSpend()
    {
        return $this->spend;
    }

    /**
     * Set remain
     *
     * @param string $remain
     *
     * @return Revenues
     */
    public function setRemain($remain)
    {
        $this->remain = $remain;

        return $this;
    }

    /**
     * Get remain
     *
     * @return string
     */
    public function getRemain()
    {
        return $this->remain;
    }

    /**
     * Set revenu
     *
     * @param string $revenu
     *
     * @return Revenues
     */
    public function setRevenu($revenu)
    {
        $this->revenu = $revenu;

        return $this;
    }

    /**
     * Get revenu
     *
     * @return string
     */
    public function getRevenu()
    {
        return $this->revenu;
    }

    /**
     * Set costs
     *
     * @param string $costs
     *
     * @return Revenues
     */
    public function setCosts($costs)
    {
        $this->costs = $costs;

        return $this;
    }

    /**
     * Get costs
     *
     * @return string
     */
    public function getCosts()
    {
        return $this->costs;
    }
}
