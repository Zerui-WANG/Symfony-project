<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\Player;
use Exception;

class PlayerService
{
    public function __construct()
    {
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
}