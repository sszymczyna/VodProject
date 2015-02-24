<?php

namespace Uek\VodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Films
 *
 * @ORM\Table(name="films")
 * @ORM\Entity
 */
class Films
{
    /**
     * @var string
     *
     * @ORM\Column(name="film_name", type="string", length=30, nullable=false)
     */
    private $filmName;

    /**
     * @var \Orders
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="film_id", referencedColumnName="vod_order_id")
     * })
     */
    private $film;



    /**
     * Set filmName
     *
     * @param string $filmName
     * @return Films
     */
    public function setFilmName($filmName)
    {
        $this->filmName = $filmName;

        return $this;
    }

    /**
     * Get filmName
     *
     * @return string 
     */
    public function getFilmName()
    {
        return $this->filmName;
    }

    /**
     * Set film
     *
     * @param \Uek\VodBundle\Entity\Orders $film
     * @return Films
     */
    public function setFilm(\Uek\VodBundle\Entity\Orders $film = null)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return \Uek\VodBundle\Entity\Orders 
     */
    public function getFilm()
    {
        return $this->film;
    }
}
