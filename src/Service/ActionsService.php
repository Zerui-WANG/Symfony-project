<?php

namespace App\Service;

use App\Entity\Action;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ActionsService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function create($manager, $answers): array
    {
        $actions = array();

        for($i = 0; $i < 10; $i++) {
            $action = new Action();

            switch ($i) {
                case 1:
                    $period = "midi";
                    break;
                case 2:
                    $period = "soir";
                    break;
                default:
                    $period = "matin";
            }

            $action->setDuration($i + 2)
                ->setActionPeriod($period)
                ->setIsAvailable(true)
                ->setApplication("Boom")
                ->setNameQuestion("Nom de l'action n°" . $i)
                ->setDescriptionQuestion("Description de l'action n°" . $i);

            $manager->persist($action);
            array_push($actions, $action);
        }

        $counter = 0;

        for($j = 0; $j < count($answers); $j++){
            if($counter < count($actions))
            {
                $actions[$counter++]->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j++])
                    ->addAnswer($answers[$j]);
            }
        }

        return $actions;
    }

    public function actionActivation(UserInterface $user) : Action
    {
        $game = $user->getGame();
        $time = $game->getDayTime();
        $actions = $this->em->getRepository(Action::class)
            ->findBy([
                'game' => $game,
                'actionPeriod' => $time,
            ]);
        $counter = count($actions);
        return $actions[mt_rand(0, $counter-1)];
    }
}