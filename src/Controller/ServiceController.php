<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

#[Route('/service/{name}', name: 'ines')]

public function showservice($name): Response
{
    return $this->render('service/showservice.html.twig', [
        'name' => $name,
    ]);
}

#[Route('/redirect', name: 'app_services')]

public function goToIndex(): Response
{ 
    return $this->redirectToRoute('app_service');
}
}