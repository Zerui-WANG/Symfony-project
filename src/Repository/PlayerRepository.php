<?php

namespace App\Repository;

use App\Entity\Answer;
use App\Entity\Player;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @method Player|null find($id, $lockMode = null, $lockVersion = null)
 * @method Player|null findOneBy(array $criteria, array $orderBy = null)
 * @method Player[]    findAll()
 * @method Player[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }

    public function create(): Player
    {
        $player = new Player();
        $player->setMood(100)
            ->setSleep(100)
            ->setCharisma(5)
            ->setPedagogy(5);

        return $player;
    }

    /**
     * @param Player $player
     * @param Answer $answer
     * @param $entityManager
     * @throws Exception
     */
    public function update(Player $player, Answer $answer, $entityManager)
    {
        $effectPlayers = $answer->getEffectPlayers();

        foreach ($effectPlayers as $effectPlayer){
            switch ($effectPlayer->getCharacteristicPlayer()){
                case 'mood':
                    $player->setMood($player->getMood() + $effectPlayer->getValueEffectPlayer());
                    $entityManager->flush();
                    break;
                case 'sleep':
                    $player->setSleep($player->getSleep() + $effectPlayer->getValueEffectPlayer());
                    $entityManager->flush();
                    break;
                case 'charisma':
                    $player->setCharisma($player->getCharisma() + $effectPlayer->getValueEffectPlayer());
                    $entityManager->flush();
                    break;
                case 'pedagogy':
                    $player->setPedagogy($player->getPedagogy() + $effectPlayer->getValueEffectPlayer());
                    $entityManager->flush();
                    break;
                default:
                    throw new Exception('Player Characteristic don\'t match');
            }
        }
    }

    // /**
    //  * @return Player[] Returns an array of Player objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Player
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
