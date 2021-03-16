<?php


namespace App\Service;


use App\Entity\Action;
use App\Entity\Event;

class ActionsService
{
    public function create($manager, $answers, $events): array
    {
        $actions = array();

        for($i = 0; $i < 3; $i++) {
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
                ->setNameQuestion("Nom de question n°" . ($i + 5))
                ->setDescriptionQuestion("Description de question n°" . ($i + 5));

            $manager->persist($action);
            array_push($actions, $action);
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
}