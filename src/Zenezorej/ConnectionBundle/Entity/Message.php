<?php

namespace Zenezorej\ConnectionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 *
 * @ORM\Table(name="message")
 * @ORM\Entity
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * Bidirectional - Many Comments are authored by one user (OWNING SIDE)
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messages")
     */
     private $user;

     /**
     * Bidirectional - Many Comments are authored by one user (OWNING SIDE)
     *
     * @ORM\ManyToOne(targetEntity="Topic", inversedBy="messages")
     */
     private $topic;



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
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Message
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \Zenezorej\ConnectionBundle\Entity\User $user
     * @return Message
     */
    public function setUser(\Zenezorej\ConnectionBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Zenezorej\ConnectionBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set topic
     *
     * @param \Zenezorej\ConnectionBundle\Entity\Topic $topic
     * @return Message
     */
    public function setTopic(\Zenezorej\ConnectionBundle\Entity\Topic $topic = null)
    {
        $this->topic = $topic;
    
        return $this;
    }

    /**
     * Get topic
     *
     * @return \Zenezorej\ConnectionBundle\Entity\Topic 
     */
    public function getTopic()
    {
        return $this->topic;
    }
}