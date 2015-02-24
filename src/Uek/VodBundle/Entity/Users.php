<?php

namespace Uek\VodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 */
class Users
{
    /**
     * @var string
     */
    private $vodUserName;

    /**
     * @var \Uek\VodBundle\Entity\Orders
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
