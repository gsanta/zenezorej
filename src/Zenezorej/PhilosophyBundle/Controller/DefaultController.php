<?php

namespace Zenezorej\PhilosophyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejPhilosophyBundle:Default:index.html.twig');
    }
}
