<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NurseryProgramController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZenezorejUserPagesBundle:NurseryProgram:index.html.twig');
    }

    public function foglalkozasDemoAction() {
    	return $this->render('ZenezorejUserPagesBundle:NurseryProgram:foglalkozas_demo.html.twig');
    }
}
