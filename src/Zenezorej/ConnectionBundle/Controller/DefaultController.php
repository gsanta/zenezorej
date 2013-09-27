<?php

namespace Zenezorej\ConnectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zenezorej\ConnectionBundle\Entity\Topic;
use Zenezorej\ConnectionBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request, $topicId)
    {

    	// create a task and give it some dummy data for this example
        $topic = new Topic();

        $topicForm = $this->createFormBuilder($topic)
            ->add('name', 'text')
            ->getForm();

        $topicForm->handleRequest($request);

        if ($topicForm->isValid()) {
            
            $usr= $this->get('security.context')->getToken()->getUser();

            $topic->setUser($usr);

            $em = $this->getDoctrine()->getManager();
            $em->persist($topic);
            $em->flush();
            return $this->redirect($this->generateUrl('connection_homepage', array('topicId' => $topic->getId())));
        }

        $message = new Message();

        $messageForm = $this->createFormBuilder($message)
            ->add('content','textarea')
            ->getForm();

        $messageForm->handleRequest($request);

        if ($messageForm->isValid() && $topicId > -1) {
            
            $usr= $this->get('security.context')->getToken()->getUser();
            $topic = $this->getTopicById($topicId);

            $message->setUser($usr);
            $message->setTopic($topic);
            $message->setDate(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirect($this->generateUrl('connection_homepage', array('topicId' => $topicId)));
        }

        $topicRepository = $this->getDoctrine()->getRepository('ZenezorejConnectionBundle:Topic');

        $topics = $topicRepository->findAll();

        $messages = array();

        if($topicId != -1) {
            $messages = $this->fetchAllMessagesByTopicId($topicId);
        }

        return $this->render('ZenezorejConnectionBundle:Default:index.html.twig',array('topicForm' => $topicForm->createView(),
            'messageForm' => $messageForm->createView(), 'topics' => $topics, 'messages' => $messages));
    }

    private function getTopicById($topicId) {
        $topicRepository = $this->getDoctrine()->getRepository('ZenezorejConnectionBundle:Topic');
        $topic = $topicRepository->find($topicId);

        return $topic;
    }

    private function fetchAllMessagesByTopicId($topicId) {
        $topic = $this->getTopicById($topicId);

        $messageRepository = $this->getDoctrine()->getRepository('ZenezorejConnectionBundle:Message');
        $messages = $messageRepository->findByTopic($topic);

        return $messages; 
    }
}
