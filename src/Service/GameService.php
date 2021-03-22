<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\Game;
use App\Entity\Player;
use App\Entity\User;
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

    public function __construct(EntityManagerInterface $manager, SessionInterface $session, UserInterface $user)
    {
        $this->manager = $manager;
        $this->user = $user;
        $this->session = $session;
    }

    public function createGameService(): Game
    {
        $userUser = $this->manager->getRepository(User::class)->find($this->user->getId());

        $playerService = new PlayerService($this->manager,$this->session, $this->user);
        $player = $playerService->create();

        $studentsService = new StudentsService($this->manager,$this->session, $this->user);
        $students = $studentsService->create();

        $answers = $this->em->getRepository(Answer::class)->findAll();

        $eventsService = new EventService($this->manager);
        $events = $eventsService->create($this->manager, $answers);

        $actionsService = new ActionsService($this->manager);
        $actions = $actionsService->create($this->manager, $answers, $events);

        $game = $this->create($player, $userUser, $students, $actions, $events);

        $this->manager->persist($game);
        $this->manager->flush();

        return $game;
    }

    public function create(Player $player, User $user, $students, $actions, $events): Game
    {
        $game = new Game();
        $game->setPlayer($player)
            ->setUser($user)
            ->setTurn(10)
            ->setDayTime(0)
            ->setCreatedAt(new \datetime('now'));

        foreach($students as $student ){
            $game->addStudent($student);
        }

        foreach($actions as $action ){
            $game->addQuestion($action);
        }

        foreach($events as $event ){
            $game->addQuestion($event);
        }
        return $game;
    }
}