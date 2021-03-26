<?php

namespace App\Controller;

use App\Entity\Student;
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
        $game = $this->getUser()->getGame();
        $failed_students = $this->getDoctrine()->getRepository(Student::class)->areFailing($game);

        return $this->render('end_game/index.html.twig', [
            'game' => $game,
            'failed_students' => $failed_students
        ]);
    }
}
