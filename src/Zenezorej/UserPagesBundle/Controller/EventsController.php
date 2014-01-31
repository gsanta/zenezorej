<?php

namespace Zenezorej\UserPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventsController extends Controller
{
    public function indexAction()
    {

    	$events = $this->fetchAllEvents();

        return $this->render('ZenezorejUserPagesBundle:Events:index.html.twig', array("events" => $events));
    }

    private function fetchAllEvents() {

	    $repository = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:Events');

	    $query = $repository->createQueryBuilder('e')
	    			->orderBy('e.start_date', 'DESC')
    				->getQuery();

    	$events = $query->getResult();

	    return $events;
	}
}
