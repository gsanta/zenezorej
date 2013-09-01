<?php

namespace Zenezorej\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction() {

    	$news = $this->fetchAllNews();

        return $this->render('ZenezorejMainBundle:Default:index.html.twig', array("news" => $news));
    }

    private function fetchAllNews() {

	    $news = $this->getDoctrine()
	        ->getRepository('ZenezorejMainBundle:News')
	        ->findAll();

	    return $news;
	}
}
 