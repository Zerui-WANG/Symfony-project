<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\EffectPlayer;
use App\Repository\AnswerRepository;
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
                        ->addPlayer($this->getReference(('player_'.($i % 2))));

                    for($j=0;$j<39;$j++)
                    {
                        $effectPlayer->addAnswer($this->getReference('answer_'.($j)));
                    }

                    break;
                case 1:
                    $effectPlayer->setCharacteristicPlayer('sleep')
                        ->setValueEffectPlayer(10)
                        ->addAnswer($this->getReference('answer_' . $i % 2));

                    for($j=0;$j<39;$j+=2)
                    {
                        $effectPlayer->addAnswer($this->getReference('answer_'.($j)));
                    }
                    break;
                case 2:
                    $effectPlayer->setCharacteristicPlayer('charisma')
                        ->setValueEffectPlayer(2)
                        ->addAnswer($this->getReference('answer_' . $i % 2));

                    for($j=1;$j<39;$j+=2)
                    {
                        $effectPlayer->addAnswer($this->getReference('answer_'.($j)));
                    }

                    break;
                default:
                    $effectPlayer->setCharacteristicPlayer('pedagogy')
                        ->setValueEffectPlayer(3)
                        ->addAnswer($this->getReference('answer_' . $i % 2));

                    for($j=0;$j<39;$j+=2)
                    {
                        $effectPlayer->addAnswer($this->getReference('answer_'.($j)));
                    }
            }

            $manager->persist($effectPlayer);
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
