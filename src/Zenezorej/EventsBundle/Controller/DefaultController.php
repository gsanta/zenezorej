<?php

namespace Zenezorej\EventsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	$events = $this->fetchAllEvents();

        return $this->render('ZenezorejEventsBundle:Default:index.html.twig', array("events" => $events));
    }

    private function fetchAllEvents() {

	    $repository = $this->getDoctrine()
	        ->getRepository('ZenezorejEventsBundle:Events');

	    $query = $repository->createQueryBuilder('e')
	    			->orderBy('e.start_date', 'DESC')
    				->getQuery();

    	$events = $query->getResult();

	    return $events;
	}
}
