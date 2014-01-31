<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConnectionController extends Controller
{
    public function indexAction(Request $request)
    {

        return $this->render('ZenezorejUserPagesBundle:Connection:index.html.twig');
    }
}
