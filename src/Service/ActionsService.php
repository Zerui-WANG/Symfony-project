<?php

namespace App\Service;

use App\Entity\Action;
use App\Entity\Game;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ActionsService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;
    /**
     * @var UserInterface
     */
    private UserInterface $user;

    public function __construct(EntityManagerInterface $manager, UserInterface $user)
    {
        $this->manager = $manager;
        $this->user = $user;
    }

    public function create($answers, $events): array
    {
        //Search actions templates from the template game : id=3
        $actions = $this->manager->getRepository(Action::class)->findBy([
            'game' => $this->manager->getRepository(Game::class)->find(3)
        ]);

        $actionAdded = array();
        for ($i = 0; $i < 3; $i++) {
            $keyToAdd = array_rand($actions, 1);
            while(in_array($keyToAdd, $actionAdded)){
                $keyToAdd = array_rand($actions, 1);
            }
            $action = $actions[$keyToAdd];
            array_push($actionAdded, $keyToAdd);
            $this->manager->persist($action);
        }

        $counter = 0;
        for($j = (count($events) * 2); $j < count($answers); $j++){
            if($counter < count($actions))
            {
                $actions[$counter++]->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j]);
            }
        }

        return $actions;
    }

    public function actionActivation(String $app): array
    {
        $game = $this->user->getGame();
        $actions = array();

        if($game->getDayTime() == 0)
        {
            $actions = $this->manager->getRepository(Action::class)
                ->findBy([
                    'game' => $game,
                    'actionPeriod' => 0,
                    'app' => $app
                ]);
        }
        elseif ($game->getDayTime() == 1)
        {
            $actions = $this->manager->getRepository(Action::class)
                ->findBy([
                    'game' => $game,
                    'actionPeriod' => 1,
                    'app' => $app
                ]);
        }
        elseif ($game->getDayTime() == 2)
        {
            $actions = $this->manager->getRepository(Action::class)
                ->findBy([
                    'game' => $game,
                    'actionPeriod' => 2,
                    'app' => $app
                ]);
        }

        return $actions;
    }
}