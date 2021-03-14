<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 6; $i++){
            $answer = new Answer();
            $answer->setDescriptionAnswer("Description answer n°$i")
                    ->setQuestion($this->getReference('question_'.$i));

            $this->setReference('answer_'.$i, $answer);

            $manager->persist($answer);
        }

        for($j = 6; $j < 12; $j++){
            $answer = new Answer();
            $answer->setDescriptionAnswer("Description answer n°$j")
                ->setQuestion($this->getReference('question_'.($j - 6)));

            $this->setReference('answer_'.$j, $answer);

            $manager->persist($answer);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            EventFixtures::class,
        );
    }
}
