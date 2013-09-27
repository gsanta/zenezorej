<?php

namespace Zenezorej\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Zenezorej\ConnectionBundle\Entity\Login;
use Zenezorej\ConnectionBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function loginAction(Request $request)
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        $login = new Login();
        $login->setUserName($session->get(SecurityContext::LAST_USERNAME));
        $login->setPassword('Jelszó');

        $loginForm = $this->createFormBuilder($login)
            ->add('userName', 'text')
            ->add('password', 'password')
            ->add('save', 'submit')
            ->getForm();

        $registrationUser = new User();

        $registrationForm = $this->createFormBuilder($registrationUser)
            ->add('userName', 'text')
            ->add('email', 'email')
            ->add('password', 'password')
            ->getForm();

        $registrationForm->handleRequest($request);

        if ($registrationForm->isValid()) {
            if($request->request->get('confirm') === $registrationForm["password"]->getData()) {
                if($request->request->get("registrationPassword") === "Mesezene2012") {
                    /*$usr= $this->get('security.context')->getToken()->getUser();
                    $topic = $this->getTopicById($topicId);

                    $message->setUser($usr);
                    $message->setTopic($topic);
                    $message->setDate(new \DateTime());

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($message);
                    $em->flush();
                    return $this->redirect($this->generateUrl('connection_homepage', array('topicId' => $topicId)));*/
                    $registrationUser->setRegistrationDate(new \DateTime());
                    $registrationUser->setSalt("Mesezene2012");
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($registrationUser);
                    $em->flush();
                } else {
                    $session->getFlashBag()->add('registrationRegistrationPasswordError', 'A Regisztrációs jelszó hibás');
                }
            } else {
                $session->getFlashBag()->add('registrationConfirmError', 'A Jelszó és a Jelszó újra nem egyezik');
            }  
        }
        
        return $this->render(
            'ZenezorejSecurityBundle:Default:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
                'registrationForm' => $registrationForm->createView()
            )
        );
    }
}
