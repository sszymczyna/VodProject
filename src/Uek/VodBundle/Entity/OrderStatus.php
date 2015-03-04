<?php

namespace Uek\VodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="orderStatus")
 * @ORM\Entity
 */
class OrderStatus
{
     /**
      * @ORM\Id
      * @ORM\Column(type="string", length=100)
      */
   
     protected $name;
     
     /**
      * @ORM\OneToMany(targetEntity="Orders", mappedBy="orderStatus")
      */
     protected $orders;

     public function __construct()
     {
         $this->orders = new ArrayCollection();
     }

    /**
     * Set name
     *
     * @param string $name
     * @return OrderStatus
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
     * Add orders
     *
     * @param \Uek\VodBundle\Entity\Orders $orders
     * @return OrderStatus
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
