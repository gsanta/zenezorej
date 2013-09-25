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
    private $name;

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


}
