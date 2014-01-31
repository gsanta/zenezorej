<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChannelController extends Controller
{
    public function indexAction() {
    	$videos = $this->fetchAllVideos();
    	$channels = $this->fetchAllChannels();

        return $this->render('ZenezorejUserPagesBundle:Channel:zorej-tv.html.twig', array("videos" => $videos, "channels" => $channels));
    }

    private function fetchAllVideos() {

	    $videos = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:Videos')
	        ->findAll();

	    return $videos;
	}

	private function fetchAllChannels() {
		$channels = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:Channels')
	        ->findAll();

	    return $channels;
	}
}