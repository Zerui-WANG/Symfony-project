<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class JournalController extends AbstractController
{
    /**
     * @Route("/journal", name="journal")
     * @param UserInterface $user
     * @return Response
     */
    public function index(UserInterface $user): Response
    {
        $game = $user->getGame();

        return $this->render('journal/journal.html.twig', [
            'game' => $game,
        ]);
    }

}
