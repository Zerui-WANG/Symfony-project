<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StudentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 25; $i++){
            $student = new Student();
            $student->setAttendance(random_int(1, 100))
                ->setPersonality(random_int(1, 10))
                ->setGrade(random_int(5, 15))
                ->setIsFailure(false)
                ->setIsPresent(true)
                ->setName('Student n°' . $i)
                ->setGame($this->getReference('game_1'));

            if($student->getGrade() < 10)
            {
                $student->setIsFailure(true);
            }

            $this->setReference('student_'.$i, $student);

            $manager->persist($student);
        }

        for($j = 25; $j < 50; $j++){
            $student = new Student();
            $student->setAttendance(random_int(1, 100))
                ->setPersonality(random_int(1, 10))
                ->setGrade(random_int(5, 15))
                ->setIsFailure(false)
                ->setIsPresent(true)
                ->setName('Student n°' . $j)
                ->setGame($this->getReference('game_2'));

            if($student->getGrade() < 10)
            {
                $student->setIsFailure(true);
            }

            $this->setReference('student_'.$j, $student);

            $manager->persist($student);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
           GameFixtures::class,
        );
    }
}