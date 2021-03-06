<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $answers = array();

        for($i = 0; $i < 16; $i++){
            $answer = new Answer();
            $answer->setDescriptionAnswer("Description answer n°$i");


            array_push($answers, $answer);
            $this->setReference('answer_'.$i, $answer);

            $manager->persist($answer);
        }

        $count = 0;
        for( $j = 0; $j < count($answers); $j++){
            for($k = 0; $k < 3; $k++){
                $answers[$j++]->addQuestion($this->getReference('question_' . $count));
            }
            $count++;
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
