<?php

namespace App\DataFixtures;

use App\Entity\EffectPlayer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EffectPlayerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $effectPlayers = array();
        for($i = 0; $i < 4; $i++){
            $effectPlayer = new EffectPlayer();
            switch ($i) {
                case 0:
                    $effectPlayer->setCharacteristicPlayer('mood')
                        ->setValueEffectPlayer(10);
                    break;
                case 1:
                    $effectPlayer->setCharacteristicPlayer('sleep')
                        ->setValueEffectPlayer(-10);
                    break;
                case 2:
                    $effectPlayer->setCharacteristicPlayer('charisma')
                        ->setValueEffectPlayer(1);
                    break;
                default:
                    $effectPlayer->setCharacteristicPlayer('pedagogy')
                        ->setValueEffectPlayer(2);
            }
            $manager->persist($effectPlayer);
            array_push($effectPlayers, $effectPlayer);
        }

        for ($j = 8; $j < 16; $j++){
            if($j < 12){
                $effectPlayers[0]->addAnswer($this->getReference('answer_' . $j));
                $effectPlayers[1]->addAnswer($this->getReference('answer_' . $j));
            }
            else {
                $effectPlayers[2]->addAnswer($this->getReference('answer_' . $j));
                $effectPlayers[3]->addAnswer($this->getReference('answer_' . $j));
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            AnswerFixtures::class,
        );
    }
}
