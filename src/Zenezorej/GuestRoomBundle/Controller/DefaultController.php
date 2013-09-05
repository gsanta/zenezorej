<?php

namespace Zenezorej\GuestRoomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	$opinions = $this->fetchAllOpinions();

        return $this->render('ZenezorejGuestRoomBundle:Default:index.html.twig', array("opinions" => $opinions));
    }

    private function fetchAllOpinions() {

	    $opinions = $this->getDoctrine()
	        ->getRepository('ZenezorejGuestRoomBundle:Opinion')
	        ->findAll();

	    return $opinions;
	}
}
