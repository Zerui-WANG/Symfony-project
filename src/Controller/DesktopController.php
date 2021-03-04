<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DesktopController extends AbstractController
{
    /**
     * @Route("/desktop", name="desktop")
     */
    public function index(): Response
    {
        return $this->render('desktop/index.html.twig', [
            'controller_name' => 'DesktopController',
        ]);
    }
}
