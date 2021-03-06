<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\Game;
use App\Entity\Player;
use App\Entity\User;
use datetime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class GameService
{
    /**
     * @var UserInterface
     */
    private UserInterface $user;
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;
    /**
     * @var SessionInterface
     */
    private SessionInterface $session;
    private int $template_game_id;

    public function __construct(EntityManagerInterface $manager, SessionInterface $session,
                                UserInterface $user, int $template_game_id)
    {
        $this->manager = $manager;
        $this->user = $user;
        $this->session = $session;
        $this->template_game_id = $template_game_id;
    }

    public function createGameService(): Game
    {
        $game = new Game();

        $userUser = $this->manager->getRepository(User::class)->find($this->user->getId());

        $playerService = new PlayerService($this->manager,$this->session, $this->user);
        $player = $playerService->create();

        $students = new StudentsService($this->manager,$this->session, $this->user, $this->template_game_id);
        $students->create($game);

        $answers = $this->manager->getRepository(Answer::class)->findAll();

        $eventsService = new EventService($this->manager, $this->template_game_id);
        $events = $eventsService->create($game, $answers);

        $actions = new ActionsService($this->manager, $this->user, $this->template_game_id);
        $actions->create($game, $answers, $events);

        $game = $this->gameSet($game, $player, $userUser);

        $this->manager->persist($game);
        $this->manager->flush();

        return $game;
    }

    public function gameSet(Game $game, Player $player, User $user): Game
    {
        $game->setPlayer($player)
            ->setUser($user)
            ->setTurn(10)
            ->setDayTime(0)
            ->setCreatedAt(new datetime('now'));

        return $game;
    }
}