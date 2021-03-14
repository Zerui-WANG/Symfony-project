<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 3; $i++){
            $player = new Player();
            $player->setMood(100)
                ->setSleep(100)
                ->setCharisma(5)
                ->setPedagogy(5);

            $this->setReference('player_'.$i, $player);

            $manager->persist($player);

        }

        $manager->flush();

    }
}
