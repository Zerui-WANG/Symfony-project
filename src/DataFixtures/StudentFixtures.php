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
            $student->setAttendance(mt_rand(1, 100))
                ->setPersonality(mt_rand(1, 10))
                ->setGrade(mt_rand(5, 15))
                ->setIsFailure(false)
                ->setIsPresent(true)
                ->setGame($this->getReference('game_1'));

            $this->setReference('student_'.$i, $student);

            $manager->persist($student);
        }

        for($j = 25; $j < 50; $j++){
            $student = new Student();
            $student->setAttendance(mt_rand(1, 100))
                ->setPersonality(mt_rand(1, 10))
                ->setGrade(mt_rand(5, 15))
                ->setIsFailure(false)
                ->setIsPresent(true)
                ->setGame($this->getReference('game_2'));

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