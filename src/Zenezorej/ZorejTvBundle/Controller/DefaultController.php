<?php

namespace Zenezorej\ZorejTvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction() {
    	$videos = $this->fetchAllVideos();
    	$channels = $this->fetchAllChannels();

        return $this->render('ZenezorejZorejTvBundle:Default:index.html.twig', array("videos" => $videos, "channels" => $channels));
    }

    private function fetchAllVideos() {

	    $videos = $this->getDoctrine()
	        ->getRepository('ZenezorejZorejTvBundle:Videos')
	        ->findAll();

	    return $videos;
	}

	private function fetchAllChannels() {
		$channels = $this->getDoctrine()
	        ->getRepository('ZenezorejZorejTvBundle:Channels')
	        ->findAll();

	    return $channels;
	}
}
