<?php 

namespace Zenezorej\ConnectionBundle\Entity;

class Login
{
    protected $userName;

    protected $password;

    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getPassword() 
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}