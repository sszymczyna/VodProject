<?php

 namespace Uek\VodBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
 use Doctrine\Common\Collections\ArrayCollection;
 
 /**
  * @ORM\Entity
  * @ORM\Table(name="users")
  */
 class Users extends BaseUser
 {
     /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue(strategy="AUTO")
      */
     protected $id;

     /**
      * @ORM\OneToMany(targetEntity="Orders", mappedBy="users")
      */
     protected $orders;

     public function __construct()
     {
         parent::__construct();
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
