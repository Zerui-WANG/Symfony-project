<?php

namespace App\Repository;

use App\Entity\Action;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Action|null find($id, $lockMode = null, $lockVersion = null)
 * @method Action|null findOneBy(array $criteria, array $orderBy = null)
 * @method Action[]    findAll()
 * @method Action[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Action::class);
    }

    public function create($manager): array
    {
        $actions = array();

        for($i = 0; $i < 3; $i++) {
            $action = new Action();

            switch ($i) {
                case 1:
                    $period = "midi";
                    break;
                case 2:
                    $period = "soir";
                    break;
                default:
                    $period = "matin";
            }

            $action->setDuration($i + 2)
                ->setActionPeriod($period)
                ->setIsAvailable(true)
                ->setNameQuestion("Nom de question n°" . ($i + 5))
                ->setDescriptionQuestion("Description de question n°" . ($i + 5));

            $manager->persist($action);
            array_push($actions, $action);
        }

        return $actions;
    }
    // /**
    //  * @return Action[] Returns an array of Action objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Action
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
