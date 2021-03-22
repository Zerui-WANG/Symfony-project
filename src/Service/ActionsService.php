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

    public function create(Game $game, $answers, $events): array
    {
        $actionsNumberToCreate = 5;
        $templateGame = 12;
        //Search actions templates from the template game : id=3
        $actions = $this->manager->getRepository(Action::class)->findBy([
            'game' => $this->manager->getRepository(Game::class)->find($templateGame)
        ]);

        $selectedActions = array();
        $selectedIndex = array_rand($actions, $actionsNumberToCreate);
        foreach ($selectedIndex as $index){
            $action = new Action();
            $action->setDuration($actions[$index]->getDuration())
                ->setActionPeriod($actions[$index]->getActionPeriod())
                ->setIsAvailable($actions[$index]->getIsAvailable())
                ->setNameQuestion($actions[$index]->getNameQuestion())
                ->setDescriptionQuestion($actions[$index]->getDescriptionQuestion())
                ->setApp($actions[$index]->getApp())
                ->setGame($game);
            $this->manager->persist($action);
            array_push($selectedActions, $action);
        }

        $counter = 0;
        for($j = (count($events) * 2); $j < count($answers); $j++){
            if($counter < count($selectedActions))
            {
                $selectedActions[$counter++]->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j]);
            }
        }

        return $selectedActions;
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