<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */

    public function index(): Response
    {
        return $this->render('menu/menu.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }
}