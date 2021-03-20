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

    public function create($manager, $answers) : array
    {
        $events = array();

        for ($i = 0; $i < 3; $i++) {
            $event = new Event();
            $event->setCooldown($i)
                ->setFrequency($i%2)
                ->setCooldownMin($i + 1)
                ->setCooldownMax($i + 5)
                ->setNameQuestion("Event n°$i")
                ->setDescriptionQuestion("Description de l'event n°$i");

            $manager->persist($event);
            array_push($events, $event);
        }

        $counter = 0;
        for($j = 0; $j < (count($events)*3); $j++){
            if($counter < count($events))
            {
                $events[$counter++]->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j]);
            }
        }

        return $events;
    }
}