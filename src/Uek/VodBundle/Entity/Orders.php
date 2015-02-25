<?php

 namespace Uek\VodBundle\Entity;

 use Doctrine\ORM\Mapping as ORM;

 /**
  * @ORM\Entity
  * @ORM\Table(name="orders")
  */
 class Orders
 {
     /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue(strategy="AUTO")
      */
     protected $id;

     /**
      * @ORM\Column(type="datetime")
      */
     protected $date;
  
      /**
      * @ORM\ManyToOne(targetEntity="Films", inversedBy="orders")
      * @ORM\JoinColumn(name="films_id", referencedColumnName="id")
      */
     protected $films;
     
      /**
      * @ORM\ManyToOne(targetEntity="Users", inversedBy="orders")
      * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
      */
     protected $users;     
 
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
     * Set date
     *
     * @param \timedate $date
     * @return Orders
     */
    public function setDate(\timedate $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \timedate 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set films
     *
     * @param \Uek\VodBundle\Entity\Films $films
     * @return Orders
     */
    public function setFilms(\Uek\VodBundle\Entity\Films $films = null)
    {
        $this->films = $films;

        return $this;
    }

    /**
     * Get films
     *
     * @return \Uek\VodBundle\Entity\Films 
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * Set users
     *
     * @param \Uek\VodBundle\Entity\Users $users
     * @return Orders
     */
    public function setUsers(\Uek\VodBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \Uek\VodBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
