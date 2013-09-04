<?php

namespace Zenezorej\OvodaiProgramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejOvodaiProgramBundle:Default:index.html.twig');
    }
}
