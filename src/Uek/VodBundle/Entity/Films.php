<?php

 namespace Uek\VodBundle\Entity;

 use Doctrine\ORM\Mapping as ORM;
 use Doctrine\Common\Collections\ArrayCollection;

 /**
  * @ORM\Entity
  * @ORM\Table(name="films")
  */
 class Films
 {
     /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue(strategy="AUTO")
      */
     protected $id;

     /**
      * @ORM\Column(type="string", length=100)
      */
     protected $name;
  
     
     /**
      * @ORM\Column(type="string", length=100)
      */
     protected $actor1;   
     
     /**
      * @ORM\Column(type="string", length=100)
      */
     protected $actor2;   
     
     /**
     * @ORM\Column(type="decimal", scale = 2)
     */
    protected $price;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $available;

    /**
     * @ORM\Column(type="blob")
     */
    
    protected $cover;
 
    /**
     * @ORM\Column (type="text")
     */
    
    protected $description; 
      /**
      * @ORM\ManyToOne(targetEntity="Genres", inversedBy="films")
      * @ORM\JoinColumn(name="genres_name", referencedColumnName="name")
      */
     protected $genres; 

     /**
      * @ORM\OneToMany(targetEntity="Orders", mappedBy="films")
      */
     protected $orders;
     
     /**
      * @ORM\OneToMany(targetEntity="Reviews", mappedBy="films")
      */
     protected $reviews;

     
     public function __construct()
     {
         $this->orders = new ArrayCollection();
     }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Films
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
     * Set email
     *
     * @param string $email
     * @return Films
     */

    /**
     * Add orders
     *
     * @param \Uek\VodBundle\Entity\Orders $orders
     * @return Films
     */
    public function addOrder(\Uek\VodBundle\Entity\Orders $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Uek\VodBundle\Entity\Orders $orders
     */
    public function removeOrder(\Uek\VodBundle\Entity\Orders $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Films
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set actor1
     *
     * @param string $actor1
     * @return Films
     */
    public function setActor1($actor1)
    {
        $this->actor1 = $actor1;

        return $this;
    }

    /**
     * Get actor1
     *
     * @return string 
     */
    public function getActor1()
    {
        return $this->actor1;
    }

    /**
     * Set actor2
     *
     * @param string $actor2
     * @return Films
     */
    public function setActor2($actor2)
    {
        $this->actor2 = $actor2;

        return $this;
    }

    /**
     * Get actor2
     *
     * @return string 
     */
    public function getActor2()
    {
        return $this->actor2;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Films
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return Films
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set genres
     *
     * @param \Uek\VodBundle\Entity\Genres $genres
     * @return Films
     */
    public function setGenres(\Uek\VodBundle\Entity\Genres $genres = null)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * Get genres
     *
     * @return \Uek\VodBundle\Entity\Genres 
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Add reviews
     *
     * @param \Uek\VodBundle\Entity\Reviews $reviews
     * @return Films
     */
    public function addReview(\Uek\VodBundle\Entity\Reviews $reviews)
    {
        $this->reviews[] = $reviews;

        return $this;
    }

    /**
     * Remove reviews
     *
     * @param \Uek\VodBundle\Entity\Reviews $reviews
     */
    public function removeReview(\Uek\VodBundle\Entity\Reviews $reviews)
    {
        $this->reviews->removeElement($reviews);
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Set cover
     *
     * @param string $cover
     * @return Films
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Films
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
