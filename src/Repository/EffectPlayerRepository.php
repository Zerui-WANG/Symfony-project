<?php

namespace App\Repository;

use App\Entity\EffectPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EffectPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method EffectPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method EffectPlayer[]    findAll()
 * @method EffectPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EffectPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EffectPlayer::class);
    }
}
