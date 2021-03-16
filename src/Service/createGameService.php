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

class createGameService
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createGameService(UserInterface $user, EntityManagerInterface $manager)
    {
        $userUser = $this->em->getRepository(User::class)->find($user->getId());
        $player = $this->em->getRepository(Player::class)->create();
        $students = $this->em->getRepository(Student::class)->create($manager);

        $answers = $this->em->getRepository(Answer::class)->findAll();

        $actions = $this->em->getRepository(Action::class)->create($manager, $answers);
        $events = $this->em->getRepository(Event::class)->create($manager, $answers);

        $game = $this->em->getRepository(Game::class)
            ->create($player, $userUser, $students, $actions, $events);

        $manager->persist($game);
        $manager->flush();

        return $game;
    }
}