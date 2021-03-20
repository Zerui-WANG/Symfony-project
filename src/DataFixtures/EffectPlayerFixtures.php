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
        for($i = 0; $i < 4; $i++){
            $effectPlayer = new EffectPlayer();
            switch ($i) {
                case 0:
                    $effectPlayer->setCharacteristicPlayer('mood')
                        ->setValueEffectPlayer(10)
                        ->addAnswer($this->getReference('answer_' . ($i % 2)))
                        ->addPlayer($this->getReference(('player_'.($i % 2))));
                    break;
                case 1:
                    $effectPlayer->setCharacteristicPlayer('sleep')
                        ->setValueEffectPlayer(10)
                        ->addAnswer($this->getReference('answer_' . $i % 2))
                        ->addPlayer($this->getReference(('player_'.($i % 2))));
                    break;
                case 2:
                    $effectPlayer->setCharacteristicPlayer('charisma')
                        ->setValueEffectPlayer(2)
                        ->addAnswer($this->getReference('answer_' . $i % 2))
                        ->addPlayer($this->getReference(('player_'.($i % 2))));
                    break;
                default:
                    $effectPlayer->setCharacteristicPlayer('pedagogy')
                        ->setValueEffectPlayer(3)
                        ->addAnswer($this->getReference('answer_' . $i % 2))
                        ->addPlayer($this->getReference(('player_'.($i % 2))));
            }

            $manager->persist($effectPlayer);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            AnswerFixtures::class,
            PlayerFixtures::class,
        );
    }
}
