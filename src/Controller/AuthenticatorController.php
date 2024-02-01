<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthenticatorController extends AbstractController
{
    #[Route(path: '/sign-in', name: 'app_sign_in')]
    public function app_sign_in(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
             return $this->redirectToRoute('app_dashboard');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 'error' => $error
        ]);
    }

    #[Route(path: '/sign-out', name: 'app_sign_out')]
    public function app_sign_out(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
