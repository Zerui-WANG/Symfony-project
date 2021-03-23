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
        $effectStudents = array();
        for($i = 0; $i < 4; $i++){
            $effectStudent = new EffectStudent();
            switch ($i) {
                case 0:
                    $effectStudent->setCharacteristicStudent('isPresent')
                        ->setValueEffectStudent(true);

                    break;
                case 1:
                    $effectStudent->setCharacteristicStudent('grade')
                        ->setValueEffectStudent(2);

                    break;
                default:
                    $effectStudent->setCharacteristicStudent('attendance')
                        ->setValueEffectStudent($i);
            }
            $manager->persist($effectStudent);
            array_push($effectStudents, $effectStudent);
        }

        for ($j = 0; $j < 8; $j++){
            if($j < 4){
                $effectStudents[0]->addAnswer($this->getReference('answer_' . $j));
                $effectStudents[1]->addAnswer($this->getReference('answer_' . $j));
            }
            else {
                $effectStudents[2]->addAnswer($this->getReference('answer_' . $j));
                $effectStudents[3]->addAnswer($this->getReference('answer_' . $j));
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
