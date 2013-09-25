<?php

namespace Zenezorej\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Zenezorej\ConnectionBundle\Entity\Login;

class DefaultController extends Controller
{
    public function loginAction()
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

        return $this->render(
            'ZenezorejSecurityBundle:Default:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }
}
