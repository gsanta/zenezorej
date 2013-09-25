<?php

namespace Zenezorej\ConnectionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

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
}
