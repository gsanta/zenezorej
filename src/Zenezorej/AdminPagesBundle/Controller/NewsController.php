<?php

namespace Zenezorej\AdminPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Zenezorej\UserPagesBundle\Entity\News;

class NewsController extends Controller
{
    public function indexAction(Request $request)
    {

    	$actNews = new News();

    	$form = $this->createFormBuilder( $actNews )
    		->add('content', 'textarea')
    		->add('save', 'submit')
        	->getForm();

        $form->handleRequest($request);

    	if( $form->isValid() ) {
    		$actNews->setDate( new \DateTime() );
    		$actNews->setDeleted( false );

    		$em = $this->getDoctrine()->getManager();
		    $em->persist($actNews);
		    $em->flush();

        	return $this->redirect($this->generateUrl('zenezorej_admin_pages_news'));
    	}

    	$allNews = $this->fetchAllNews();

        return $this->render('ZenezorejAdminPagesBundle:News:index.html.twig', array( 
        	"news" => $allNews,
        	"form" =>  $form->createView()
        ) );
    }

    public function deleteAction($id) {

    	$em = $this->getDoctrine()->getManager();
    	$actNews = $em->getRepository('ZenezorejUserPagesBundle:News')->find($id);

	    $actNews->setDeleted(true);
	    $em->flush();

    	return new Response("ok");
    }

    public function newAction(Request $request) {

    	$news = new News();
    	//$news->setContent( $request->request->get('content') );
    	//$news->setDate( new \DateTime() );

    	$form = $this->createFormBuilder( $news )
    		->add('content', 'text')
    		->add('save', 'submit')
        	->getForm();

        $form->handleRequest($request);

    	//echo $request->request->get('content');

    	//return new Response("siker");
    	if ($form->isValid()) {
        	return $this->redirect($this->generateUrl('zenezorej_admin_pages_news'));
    	}

    	return $this->render('AdminPagesBundle:News:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    private function fetchAllNews() {

	    $news = $this->getDoctrine()
	        ->getRepository('ZenezorejUserPagesBundle:News')
	        ->findAll();

	    return $news;
	}
}
