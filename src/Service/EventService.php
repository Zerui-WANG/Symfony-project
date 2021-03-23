<?php

namespace App\Service;

use App\Entity\Event;
use App\Entity\Game;
use Doctrine\ORM\EntityManagerInterface;

class EventService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function create(Game $game, $answers) : array
    {
        $eventNumberToCreate = 3;
        $templateGameId = 6;
        //Search events templates from the template game : id=3
        $events = $this->manager->getRepository(Event::class)->findBy([
            'game' => $this->manager->getRepository(Game::class)->find($templateGameId)
        ]);

        $selectedEvents = array();
        $selectedIndex = array_rand($events, $eventNumberToCreate);
        foreach ($selectedIndex as $index){
            $event = new Event();
            $event->setCooldown($events[$index]->getCooldown())
                ->setFrequency($events[$index]->getFrequency())
                ->setCooldownMin($events[$index]->getCooldownMin())
                ->setCooldownMax($events[$index]->getCooldownMax())
                ->setNameQuestion($events[$index]->getNameQuestion())
                ->setDescriptionQuestion($events[$index]->getDescriptionQuestion())
                ->setGame($game);
            $this->manager->persist($event);
            array_push($selectedEvents, $event);
        }

        $counter = 0;
        for($j = 0; $j < (count($selectedEvents) * 2); $j++){
            if($counter < count($selectedEvents))
            {
                $selectedEvents[$counter++]->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j]);
            }
        }

        return $selectedEvents;
    }
}