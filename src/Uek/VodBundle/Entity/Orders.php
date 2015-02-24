<?php

namespace Uek\VodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="vod_order_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vodOrderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="vod_user_id", type="integer", nullable=false)
     */
    private $vodUserId;

    /**
     * @var integer
     *
     * @ORM\Column(name="vod_film_id", type="integer", nullable=false)
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
