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
        $apps = ['boom', 'netflip', 'what\'s up'];

        for($i = 0; $i < 5; $i++){
            $action = new Action();

            switch ($i){
                case 1:
                    $period = 1;
                    break;
                case 2:
                    $period = 2;
                    break;
                default:
                    $period = 0;
            }

            $action->setDuration($i + 2)
                ->setActionPeriod($period)
                ->setIsAvailable(true)
                ->setNameQuestion("Nom de question n°".($i + 3))
                ->setDescriptionQuestion("Description de question n°".($i + 3))
                ->setGame($this->getReference('game_2'));

            //Need 3 for Boom and one for other app
            if($i < 3){
                $action->setApp($apps[0]);
            }elseif ($i < 4){
                $action->setApp($apps[1]);
            }else{
                $action->setApp($apps[2]);
            }

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
