<?php

namespace Zenezorej\ConnectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zenezorej\ConnectionBundle\Entity\Topic;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request, $topicId)
    {

    	// create a task and give it some dummy data for this example
        $topic = new Topic();

        $topicForm = $this->createFormBuilder($topic)
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();

        $topicForm->handleRequest($request);

        if ($topicForm->isValid()) {
            
            $usr= $this->get('security.context')->getToken()->getUser();

            $topic->setUser($usr);

            $em = $this->getDoctrine()->getManager();
            $em->persist($topic);
            $em->flush();
            return $this->redirect($this->generateUrl('connection_homepage'));
        }

        $topicRepository = $this->getDoctrine()->getRepository('ZenezorejConnectionBundle:Topic');

        $topics = $topicRepository->findAll();

        $messages = array();

        if($topicId != -1) {
            $messages = $this->fetchAllMessagesByTopicId($topicId);
        }

        return $this->render('ZenezorejConnectionBundle:Default:index.html.twig',array('topicForm' => $topicForm->createView(), 'topics' => $topics, 'messages' => $messages));
    }

    private function fetchAllMessagesByTopicId($topicId) {
        $topicRepository = $this->getDoctrine()->getRepository('ZenezorejConnectionBundle:Topic');
        $topic = $topicRepository->find($topicId);

        $messageRepository = $this->getDoctrine()->getRepository('ZenezorejConnectionBundle:Message');
        $messages = $messageRepository->findByTopic($topic);

        return $messages; 
    }
}
