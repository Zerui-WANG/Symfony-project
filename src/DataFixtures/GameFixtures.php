<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 3; $i++){
            $game = new Game();
            $game->setTurn(1)
                ->setDayTime("matin")
                ->setCreatedAt(new \DateTime())
                ->setPlayer($this->getReference('player_'.($i)));
            $this->setReference('game_'.$i, $game);

            $manager->persist($game);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            PlayerFixtures::class,
        );
    }

}
