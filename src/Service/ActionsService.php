<?php


namespace App\Service;


use App\Entity\Action;

class ActionsService
{
    public function create($manager, $answers): array
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

            if((1 + $i * 2 + 3) < count($answers)){
                $action->addAnswer($answers[$i*2 + 3])
                    ->addAnswer($answers[1 + $i * 2 + 3]);
            }

            $manager->persist($action);
            array_push($actions, $action);
        }

        return $actions;
    }
}