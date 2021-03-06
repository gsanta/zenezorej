<?php

namespace Zenezorej\ConnectionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Topic
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Topic
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
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Message", mappedBy="topic")
     */
    private $messages;

    /**
     * Bidirectional (OWNING SIDE)
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="topics")
     */
    private $user;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
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
     * @return Topic
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
     * Add messages
     *
     * @param \Zenezorej\ConnectionBundle\Entity\Message $messages
     * @return Topic
     */
    public function addMessage(\Zenezorej\ConnectionBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Zenezorej\ConnectionBundle\Entity\Message $messages
     */
    public function removeMessage(\Zenezorej\ConnectionBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set user
     *
     * @param \Zenezorej\ConnectionBundle\Entity\User $user
     * @return Topic
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
}