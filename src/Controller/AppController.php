<?php

namespace App\Controller;

use App\Repository\ManufacturerRepository;
use App\Repository\PhoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class AppController extends AbstractController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    #[Route('/', name: 'app_phone_store')]
    public function index(PhoneRepository $phoneRepository,
                          ManufacturerRepository $manufacturerRepository): Response
    {
        $phonesData = $phoneRepository->findAllAsArray();
        $manufacturersData = $manufacturerRepository->findAllAsArray();
        $html = $this->twig->render('index.html.twig', ['phonesData'=>$phonesData,
                                                        'manufacturersData'=>$manufacturersData]);
                
        return new Response($html);
    }
}
