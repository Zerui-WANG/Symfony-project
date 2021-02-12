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

     /**
      * @return Student[] Returns an array of Student objects
      */

    public function findByGame($value) : array
    {

        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult()
        ;


     /*   $sql = "SELECT `student`.`id`,student.attendance,student.personality,student.grade,student.is_failure,student.is_present
                FROM `student`, `game` WHERE game.id = student.game_id AND game_id = 
        ";
        $sql .= "$value";
        $resultats = getQuery($sql);

        // On fouille le résultat pour en extraire les données réelles
        $students = $resultats->fetchAll();

        return $students;*/
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
