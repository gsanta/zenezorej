<?php

namespace Zenezorej\AdminPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejAdminPagesBundle:Default:index.html.twig');
    }
}
