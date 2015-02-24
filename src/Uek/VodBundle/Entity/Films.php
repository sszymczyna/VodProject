<?php

namespace Uek\VodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Films
 */
class Films
{
    /**
     * @var string
     */
    private $filmName;

    /**
     * @var \Uek\VodBundle\Entity\Orders
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
