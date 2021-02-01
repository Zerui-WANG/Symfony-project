<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class HomeController extends AbstractController
{
    /**
     * @Route("/ConfinementClassroom", name="ConfinementClassroom")
     */
    public function index(): Response
    {
        return $this->render('ConfinementClassroom/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render( 'ConfinementClassroom/home.html.twig', [
            'controller_name' => 'ConfinementClassroomControllerHome',
        ]);
    }

    /**
     * @Route("/ConfinementClassroom/game", name="game")
     */
    public function game() {
        return $this->render( 'ConfinementClassroom/game.html.twig', [
        ]);
    }
}
