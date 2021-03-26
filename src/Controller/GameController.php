<?php

namespace App\Controller;

use App\Service\GameService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/game")
 */
class GameController extends AbstractController
{
    /**
     * @Route("/new", name="game_new")
     * @param EntityManagerInterface $manager
     * @param SessionInterface $session
     * @param UserInterface $user
     * @param int $template_game_id
     * @return Response
     */
    public function new(EntityManagerInterface $manager, SessionInterface $session,UserInterface $user,
                        int $template_game_id): Response
    {
        $game = new GameService($manager, $session, $user, $template_game_id);

        return $this->render('desktop/index.html.twig', [
            'game' => $game->createGameService(),
        ]);
    }

}
