<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AcknowledgementsController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejUserPagesBundle:Acknowledgements:index.html.twig');
    }
}
