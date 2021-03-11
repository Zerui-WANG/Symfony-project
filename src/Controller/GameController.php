<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Player;
use App\Entity\User;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/game")
 */
class GameController extends AbstractController
{
    /**
     * @Route("/", name="game_index", methods={"GET"})
     */
    public function index(GameRepository $gameRepository): Response
    {
        return $this->render('game/index.html.twig', [
            'games' => $gameRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="game_new", methods={"GET","POST"})
     */
    public function new(UserInterface $user, EntityManagerInterface $manager)
    {
        $userUser = $this->getDoctrine()->getRepository(User::class)->find($user->getId());
        $player = $this->getDoctrine()->getRepository(Player::class)->create();
        $game = $this->getDoctrine()->getRepository(Game::class)->create($player, $userUser);

        $manager->persist($game);
        $manager->flush();

        dd($game);
        /*
        return $this->render('game/new.html.twig', [
            'game' => $game,
        ]);*/
    }

    /**
     * @Route("/{id}", name="game_show", methods={"GET"})
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
