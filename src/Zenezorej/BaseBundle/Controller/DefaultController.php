<?php

namespace Zenezorej\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejBaseBundle:Default:base.html.twig');
    }
}
