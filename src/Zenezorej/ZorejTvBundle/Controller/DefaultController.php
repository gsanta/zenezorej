<?php

namespace Zenezorej\ZorejTvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction() {
    	$videos = $this->fetchAllChannels();

        return $this->render('ZenezorejZorejTvBundle:Default:index.html.twig', array("videos" => $videos));
    }

    private function fetchAllChannels() {

	    $videos = $this->getDoctrine()
	        ->getRepository('ZenezorejZorejTvBundle:Videos')
	        ->findAll();

	    return $videos;
	}
}
