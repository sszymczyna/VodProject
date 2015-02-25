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
      * @ORM\OneToMany(targetEntity="Orders", mappedBy="films")
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
}
