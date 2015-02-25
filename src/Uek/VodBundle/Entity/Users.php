<?php

 namespace Uek\VodBundle\Entity;

 use Doctrine\ORM\Mapping as ORM;
 use Doctrine\Common\Collections\ArrayCollection;
 
 /**
  * @ORM\Entity
  * @ORM\Table(name="users")
  */
 class Users
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
     protected $email;
    
     /**
      * @ORM\OneToMany(targetEntity="Orders", mappedBy="users")
      */
     protected $orders;

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
     * @return Users
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
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add orders
     *
     * @param \Uek\VodBundle\Entity\Orders $orders
     * @return Users
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
}
