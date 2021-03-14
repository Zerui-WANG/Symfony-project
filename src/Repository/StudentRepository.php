<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    public function create()
    {
        $students = array();

        for($i = 0; $i < 30; $i++) {
            $student = new Student();
            $student->setAttendance(mt_rand(1, 100))
                ->setPersonality(mt_rand(1, 10))
                ->setGrade(mt_rand(5, 15))
                ->setIsFailure(false)
                ->setIsPresent(true);
            array_push($students, $student);
        }

        return $students;
    }

    /**
     * @param int $value
     * @return Student[] Returns an array of Student objects
     */

    public function findByGame(int $value) : array
    {
        return $this->createQueryBuilder('s')
            ->setParameter('val', $value)
            ->leftJoin('s.game','g')
            ->andWhere('s.game = :val')
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Student
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
