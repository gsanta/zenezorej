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
    protected $channel_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $pic_id;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="text")
     */
    protected $url;

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
     * Set channel_id
     *
     * @param integer $channelId
     * @return Channel
     */
    public function setChannelId($channelId)
    {
        $this->channel_id = $channelId;
    
        return $this;
    }

    /**
     * Get channel_id
     *
     * @return integer 
     */
    public function getChannelId()
    {
        return $this->channel_id;
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

    /**
     * Set url
     *
     * @param string $url
     * @return Videos
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
}