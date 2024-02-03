<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        if (stripos(json_encode($this->getUser()->getRoles()), 'ROLE_ADMIN') !== false) {
            return $this->render('dashboard/dashboard.html.twig', [
                'controller_name' => 'DashboardController',
            ]);
        } else {
            return $this->redirectToRoute('app_phone_store');
        }        
    }
}
