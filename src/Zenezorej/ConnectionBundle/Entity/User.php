<?php

namespace Zenezorej\ConnectionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Topic
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface, \Serializable
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
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = "25",
     *      maxMessage = "A felhasználónév legfeljebb {{ limit }} karakter hosszú lehet"
     * )
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "5",
     *      max = "25",
     *      minMessage = "A jelszó legyen legalább {{ limit }} karakter hosszú",
     *      maxMessage = "A jeszó legfeljebb {{ limit }} karakter hosszú lehet"
     * )
     * @ORM\Column(type="string", length=40)
     */
    private $password;

    /**
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = "60",
     *      maxMessage = "Az email legfeljebb {{ limit }} karakter hosszú lehet"
     * )
     * @Assert\Email(
     *     message = "Hibás email cím",
     *     checkMX = true
     * )
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    private $registration_date;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user")
     */
    private $messages;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Topic", mappedBy="user")
     */
    private $topics;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->topics = new ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set registration_date
     *
     * @param \DateTime $registrationDate
     * @return User
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registration_date = $registrationDate;
    
        return $this;
    }

    /**
     * Get registration_date
     *
     * @return \DateTime 
     */
    public function getRegistrationDate()
    {
        return $this->registration_date;
    }

    /**
     * Add messages
     *
     * @param \Zenezorej\ConnectionBundle\Entity\Message $messages
     * @return User
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
     * Add topics
     *
     * @param \Zenezorej\ConnectionBundle\Entity\Topic $topics
     * @return User
     */
    public function addTopic(\Zenezorej\ConnectionBundle\Entity\Topic $topics)
    {
        $this->topics[] = $topics;
    
        return $this;
    }

    /**
     * Remove topics
     *
     * @param \Zenezorej\ConnectionBundle\Entity\Topic $topics
     */
    public function removeTopic(\Zenezorej\ConnectionBundle\Entity\Topic $topics)
    {
        $this->topics->removeElement($topics);
    }

    /**
     * Get topics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopics()
    {
        return $this->topics;
    }

     /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }
}