<?php

namespace App\DataFixtures;

use App\Entity\EffectStudent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EffectStudentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 4; $i++){
            $effectStudent = new EffectStudent();
            switch ($i) {
                case 0:
                    $effectStudent->setCharacteristicStudent('isPresent')
                        ->setValueEffectStudent(true)
                        ->addAnswer($this->getReference('answer_' . ($i % 2 + 4)));
                    for($k = 0; $k < 25; $k++){
                        $effectStudent->addStudent($this->getReference('student_'.$k));
                    }

                    break;
                case 1:
                    $effectStudent->setCharacteristicStudent('grade')
                        ->setValueEffectStudent(2);
                     //   ->addAnswer($this->getReference('answer_' . ($i % 2 + 4)));

                    for($j=0;$j<39;$j++)
                    {
                        $effectStudent->addAnswer($this->getReference('answer_'.($j)));
                    }

                    for($k = 0; $k < 25; $k++){
                        $effectStudent->addStudent($this->getReference('student_'.$k));
                    }

                    break;
                default:
                    $effectStudent->setCharacteristicStudent('attendance')
                        ->setValueEffectStudent(mt_rand(1, 5));
                     //   ->addAnswer($this->getReference('answer_' . ($i % 2 + 4)));
                    for($j=1;$j<39;$j+=2)
                    {
                        $effectStudent->addAnswer($this->getReference('answer_'.($j)));
                    }

                    for($k = 0; $k < 25; $k++){
                        $effectStudent->addStudent($this->getReference('student_'.$k));
                    }
            }

            $manager->persist($effectStudent);
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
