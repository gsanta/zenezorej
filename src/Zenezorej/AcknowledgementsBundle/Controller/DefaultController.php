<?php

namespace Zenezorej\AcknowledgementsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejAcknowledgementsBundle:Default:index.html.twig');
    }
}
