<?php

namespace App\Repository;

use App\Entity\EffectStudent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EffectStudent|null find($id, $lockMode = null, $lockVersion = null)
 * @method EffectStudent|null findOneBy(array $criteria, array $orderBy = null)
 * @method EffectStudent[]    findAll()
 * @method EffectStudent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EffectStudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EffectStudent::class);
    }

    // /**
    //  * @return EffectStudent[] Returns an array of EffectStudent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EffectStudent
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
