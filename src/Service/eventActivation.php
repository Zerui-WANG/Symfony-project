<?php

namespace App\Service;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class eventActivation
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function eventActivation(UserInterface $user): object
    {
        $game = $user->getGame();
        $events = $this->em->getRepository(Event::class)->findBy([
            'game' => $game,
        ]);
        return $events[array_rand($events, 1)];
    }
}