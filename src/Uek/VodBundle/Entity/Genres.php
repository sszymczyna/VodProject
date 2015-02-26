<?php

 namespace Uek\VodBundle\Entity;

 use Doctrine\ORM\Mapping as ORM;
 
 /**
  * @ORM\Entity
  * @ORM\Table(name="genres")
  */
 class Genres
 {
     /**
      * @ORM\Id
      * @ORM\Column(type="string", length=100)
      */
   
     protected $name;
     
     /**
      * @ORM\OneToMany(targetEntity="Films", mappedBy="genres")
      */
     protected $films;

     public function __construct()
     {
         $this->films = new ArrayCollection();
     }

    /**
     * Set name
     *
     * @param string $name
     * @return Genres
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add films
     *
     * @param \Uek\VodBundle\Entity\Films $films
     * @return Genres
     */
    public function addFilm(\Uek\VodBundle\Entity\Films $films)
    {
        $this->films[] = $films;

        return $this;
    }

    /**
     * Remove films
     *
     * @param \Uek\VodBundle\Entity\Films $films
     */
    public function removeFilm(\Uek\VodBundle\Entity\Films $films)
    {
        $this->films->removeElement($films);
    }

    /**
     * Get films
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFilms()
    {
        return $this->films;
    }
}
