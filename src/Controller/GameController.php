<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
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
     * @Route("/", name="game_index", methods={"GET"})
     * @param GameRepository $gameRepository
     * @return Response
     */
    public function index(GameRepository $gameRepository): Response
    {
        return $this->render('game/index.html.twig', [
            'games' => $gameRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="game_new")
     * @param EntityManagerInterface $manager
     * @param SessionInterface $session
     * @param UserInterface $user
     * @return Response
     */
    public function new(EntityManagerInterface $manager, SessionInterface $session,UserInterface $user): Response
    {
        $game = new GameService($manager, $session, $user);

        return $this->render('desktop/index.html.twig', [
            'game' => $game->createGameService(),
        ]);
    }

    /**
     * @Route("/{id}", name="game_show", methods={"GET"})
     * @param Game $game
     * @return Response
     */
    public function show(Game $game): Response
    {
        $player =$game->getplayer();
        $user = $game->getUser();

        return $this->render('game/show.html.twig', [
            'game' => $game,
            'player' => $player,
            'user' => $user,
        ]);
    }

}
