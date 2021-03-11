<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NetflipController extends AbstractController
{
    #[Route('/netflip', name: 'netflip')]
    public function index(): Response
    {
        return $this->render('netflip/index.html.twig', [
            'controller_name' => 'NetflipController',
        ]);

    }

    #[Route('/netflipCatalogue', name: 'netflipCatalogue')]
    public function netflip(): Response
    {
        return $this->render('netflip/netflip.html.twig', [
            'controller_name' => 'NetflipController',
        ]);
    }
}

