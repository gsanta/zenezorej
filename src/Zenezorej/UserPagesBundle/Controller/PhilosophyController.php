<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhilosophyController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejUserPagesBundle:Philosophy:index.html.twig');
    }
}
