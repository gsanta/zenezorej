<?php

namespace Zenezorej\PublicationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	$publications = $this->fetchAllPublications();

        return $this->render('ZenezorejPublicationsBundle:Default:index.html.twig', array("publications" => $publications));
    }

    private function fetchAllPublications() {

	    $publications = $this->getDoctrine()
	        ->getRepository('ZenezorejPublicationsBundle:Publications')
	        ->findAll();

	    return $publications;
	}
}
