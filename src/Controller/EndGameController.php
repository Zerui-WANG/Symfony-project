<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EndGameController extends AbstractController
{
    /**
     * @Route("/end/game", name="end_game")
     */
    public function index(): Response
    {
        return $this->render('end_game/index.html.twig', [
            'game' => $this->getUser()->getGame()
        ]);
    }
}
