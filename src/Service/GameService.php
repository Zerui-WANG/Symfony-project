<?php

namespace App\Service;

use App\Entity\Action;
use App\Entity\Answer;
use App\Entity\Event;
use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Student;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class GameService
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createGameService(UserInterface $user, EntityManagerInterface $manager): Game
    {
        $userUser = $this->em->getRepository(User::class)->find($user->getId());

        $playerService = new PlayerService();
        $player = $playerService->create();

        $studentsService = new StudentsService();
        $students = $studentsService->create($manager);

        $answers = $this->em->getRepository(Answer::class)->findAll();

        $eventsService = new EventService($manager);
        $events = $eventsService->create($manager, $answers);

        $actionsService = new ActionsService($manager);
        $actions = $actionsService->create($manager, $answers, $events);

        $gameService = new GameService($manager);
        $game = $gameService->create($player, $userUser, $students, $actions, $events);

        $manager->persist($game);
        $manager->flush();

        return $game;
    }

    public function create(Player $player, User $user, $students, $actions, $events): Game
    {
        $game = new Game();
        $game->setPlayer($player)
            ->setUser($user)
            ->setTurn(10)
            ->setDayTime('matin')
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