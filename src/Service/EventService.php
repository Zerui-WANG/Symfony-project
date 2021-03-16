<?php

namespace App\Service;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class EventService
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

    public function create($manager, $answers) : array
    {
        $events = array();

        for ($i = 0; $i < 5; $i++) {
            $event = new Event();
            $event->setCooldown($i)
                ->setFrequency($i%2)
                ->setCooldownMin($i + 1)
                ->setCooldownMax($i + 5)
                ->setNameQuestion("Nom de question n°$i")
                ->setDescriptionQuestion("Description de question n°$i");

            $manager->persist($event);
            array_push($events, $event);
        }

        $counter = 0;
        for($j = 0; $j < (count($events) * 2); $j++){
            if($counter < count($events))
            {
                $events[$counter++]->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j]);
            }
        }

        return $events;
    }
}