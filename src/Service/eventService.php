<?php

namespace App\Service;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class eventService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function eventActivation(UserInterface $user): ?object
    {
        $game = $user->getGame();
        $currentTurn = $game->getTurn();
        $passedTurns = array();

        if (!in_array($currentTurn, $passedTurns)) {
            $events = $this->em->getRepository(Event::class)->findBy([
                'game' => $game,
            ]);

            array_push($passedTurns, $currentTurn);

            return $events[array_rand($events, 1)];
        }

        return null;
    }
}