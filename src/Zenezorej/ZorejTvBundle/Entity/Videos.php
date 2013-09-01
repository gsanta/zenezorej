<?php

namespace Zenezorej\ZorejTvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="videos")
 */
class Videos {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $csat_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $pic_id;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

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
     * Set csat_id
     *
     * @param integer $csatId
     * @return Channel
     */
    public function setCsatId($csatId)
    {
        $this->csat_id = $csatId;
    
        return $this;
    }

    /**
     * Get csat_id
     *
     * @return integer 
     */
    public function getCsatId()
    {
        return $this->csat_id;
    }

    /**
     * Set pic_id
     *
     * @param integer $picId
     * @return Channel
     */
    public function setPicId($picId)
    {
        $this->pic_id = $picId;
    
        return $this;
    }

    /**
     * Get pic_id
     *
     * @return integer 
     */
    public function getPicId()
    {
        return $this->pic_id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Channel
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