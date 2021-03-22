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
    private EntityManagerInterface $em;
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function create($answers) : array
    {
        //Search events templates from the template game : id=3
        $events = $this->manager->getRepository(Event::class)->findBy([
            'game' => $this->manager->getRepository(Game::class)->find(3)
        ]);

        $eventAdded = array();
        for ($i = 0; $i < 5; $i++) {
            $keyToAdd = array_rand($events, 1);
            while(in_array($keyToAdd, $eventAdded)){
                $keyToAdd = array_rand($events, 1);
            }
            $event = $events[$keyToAdd];
            array_push($eventAdded, $keyToAdd);
            $this->manager->persist($event);
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