<?php

namespace Uek\VodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 */
class Orders
{
    /**
     * @var integer
     */
    private $vodOrderId;

    /**
     * @var integer
     */
    private $vodUserId;

    /**
     * @var integer
     */
    private $vodFilmId;


    /**
     * Get vodOrderId
     *
     * @return integer 
     */
    public function getVodOrderId()
    {
        return $this->vodOrderId;
    }

    /**
     * Set vodUserId
     *
     * @param integer $vodUserId
     * @return Orders
     */
    public function setVodUserId($vodUserId)
    {
        $this->vodUserId = $vodUserId;

        return $this;
    }

    /**
     * Get vodUserId
     *
     * @return integer 
     */
    public function getVodUserId()
    {
        return $this->vodUserId;
    }

    /**
     * Set vodFilmId
     *
     * @param integer $vodFilmId
     * @return Orders
     */
    public function setVodFilmId($vodFilmId)
    {
        $this->vodFilmId = $vodFilmId;

        return $this;
    }

    /**
     * Get vodFilmId
     *
     * @return integer 
     */
    public function getVodFilmId()
    {
        return $this->vodFilmId;
    }
}
