<?php

namespace Zenezorej\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejDemoBundle:Default:index.html.twig');
    }

    public function mesehosokAction()
    {
        return $this->render('ZenezorejDemoBundle:Default:mesehosok.html.twig');
    }
}
