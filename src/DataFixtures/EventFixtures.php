<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 3; $i++){
            $event = new Event();
            $event->setCooldown($i)
                ->setFrequency($i%2)
                ->setCooldownMin($i + 1)
                ->setCooldownMax($i + 5)
                ->setNameQuestion("Nom de question n°$i")
                ->setDescriptionQuestion("Description de question n°$i")
                ->setGame($this->getReference('game_2'));

            $this->setReference('question_'.$i, $event);

            $manager->persist($event);
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
