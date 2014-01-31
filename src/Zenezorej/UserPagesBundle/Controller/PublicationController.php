<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicationController extends Controller
{
    public function indexAction()
    {

    	$publications = $this->fetchAllPublications();

        return $this->render('ZenezorejUserPagesBundle:Publication:index.html.twig', array("publications" => $publications));
    }

    private function fetchAllPublications() {

	    $publications = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:Publications')
	        ->findAll();

	    return $publications;
	}
}
