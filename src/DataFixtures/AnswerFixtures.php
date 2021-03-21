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

        for($i = 0; $i < 39; $i++){
            $answer = new Answer();
            $answer->setDescriptionAnswer("Description answer n°$i");


            array_push($answers, $answer);
            $this->setReference('answer_'.$i, $answer);

            $manager->persist($answer);
        }

        $counter = 0;
        for( $j = 0; $j < count($answers); $j++){
            for($k = 0; $k < 2; $k++){
                $answers[$j++]->setQuestion($this->getReference('question_' . $counter%8));
            }
            $answers[$j]->setQuestion($this->getReference('question_' . $counter%8));
            if($j==count($answers))
                break;

            $counter++;
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            EventFixtures::class,
            ActionFixtures::class,
        );
    }
}
