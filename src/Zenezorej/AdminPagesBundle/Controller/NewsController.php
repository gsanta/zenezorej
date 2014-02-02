<?php

namespace Zenezorej\AdminPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function indexAction()
    {
    	$news = $this->fetchAllNews();

        return $this->render('ZenezorejAdminPagesBundle:News:index.html.twig', array( "news" => $news ) );
    }

    public function deleteAction($id) {

    	$em = $this->getDoctrine()->getManager();
    	$actNews = $em->getRepository('ZenezorejUserPagesBundle:News')->find($id);

	    $actNews->setDeleted(true);
	    $em->flush();

    	return new Response("ok");
    }

    private function fetchAllNews() {

	    $news = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:News')
	        ->findAll();

	    return $news;
	}
}
