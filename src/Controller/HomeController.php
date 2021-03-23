<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render( 'home/index.html.twig', [
            'controller_name' => 'ConfinementClassroomControllerHome',
        ]);
    }

    /**
     * @Route("/home/game", name="game")
     */
    public function game(): Response
    {
        return $this->render( 'home/game.html.twig');
    }
}
