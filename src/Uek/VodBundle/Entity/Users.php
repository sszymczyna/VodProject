<?php

namespace Uek\VodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
    /**
     * @var string
     *
     * @ORM\Column(name="vod_user_name", type="string", length=30, nullable=false)
     */
    private $vodUserName;

    /**
     * @var \Orders
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vod_user_id", referencedColumnName="vod_order_id")
     * })
     */
    private $vodUser;



    /**
     * Set vodUserName
     *
     * @param string $vodUserName
     * @return Users
     */
    public function setVodUserName($vodUserName)
    {
        $this->vodUserName = $vodUserName;

        return $this;
    }

    /**
     * Get vodUserName
     *
     * @return string 
     */
    public function getVodUserName()
    {
        return $this->vodUserName;
    }

    /**
     * Set vodUser
     *
     * @param \Uek\VodBundle\Entity\Orders $vodUser
     * @return Users
     */
    public function setVodUser(\Uek\VodBundle\Entity\Orders $vodUser = null)
    {
        $this->vodUser = $vodUser;

        return $this;
    }

    /**
     * Get vodUser
     *
     * @return \Uek\VodBundle\Entity\Orders 
     */
    public function getVodUser()
    {
        return $this->vodUser;
    }
}
