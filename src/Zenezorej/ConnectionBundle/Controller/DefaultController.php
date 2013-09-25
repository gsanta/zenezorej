<?php

namespace Zenezorej\ConnectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zenezorej\ConnectionBundle\Entity\Login;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	// create a task and give it some dummy data for this example
        $login = new Login();
        $login->setUserName('Felhasználó név');
        $login->setPassword('Jelszó');

        $loginForm = $this->createFormBuilder($login)
            ->add('userName', 'text')
            ->add('password', 'password')
            ->add('save', 'submit')
            ->getForm();

        return $this->render('ZenezorejConnectionBundle:Default:index.html.twig',array('loginForm' => $loginForm->createView()));
    }
}
