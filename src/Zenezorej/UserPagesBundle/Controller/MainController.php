<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function indexAction() {

    	$news = $this->fetchAllNews();

        return $this->render('ZenezorejUserPagesBundle:Main:index.html.twig', array("news" => $news));
    }

    private function fetchAllNews() {

	    $news = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:News')
	        ->findAll();

	    return $news;
	}
}
 