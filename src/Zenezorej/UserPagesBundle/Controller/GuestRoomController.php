<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GuestRoomController extends Controller
{
    public function indexAction()
    {

    	$opinions = $this->fetchAllOpinions();

        return $this->render('ZenezorejUserPagesBundle:GuestRoom:index.html.twig', array("opinions" => $opinions));
    }

    private function fetchAllOpinions() {

	    $opinions = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:Opinion')
	        ->findAll();

	    return $opinions;
	}
}
