<?php

namespace App\DataFixtures;

use App\Entity\Action;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 3; $i++){
            $action = new Action();

            switch ($i){
                case 1:
                    $period = "midi";
                    $available = false;
                    break;
                case 2:
                    $period = "soir";
                    $available = false;
                    break;
                default:
                    $period = "matin";
                    $available = true;
            }

            $action->setDuration($i + 2)
                ->setActionPeriod($period)
                ->setIsAvailable($available)
                ->setNameQuestion("Nom de question n°".($i + 3))
                ->setDescriptionQuestion("Description de question n°".($i + 3))
                ->setGame($this->getReference('game_2'));

            $this->setReference('question_'.($i + 3), $action);

            $manager->persist($action);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            GameFixtures::class
        );
    }
}
