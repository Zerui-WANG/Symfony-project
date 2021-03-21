<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WhatsUpController extends AbstractController
{
    #[Route('/whats/up', name: 'whats_up')]
    public function index(): Response
    {
        return $this->render('whats_up/index.html.twig', [
            'controller_name' => 'WhatsUpController',
        ]);
    }
}
