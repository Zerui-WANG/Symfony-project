<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class PlayerService
{
    /**
     * @var UserInterface
     */
    private UserInterface $user;
    /**
     * @var SessionInterface
     */
    private SessionInterface $session;
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager, SessionInterface $session, UserInterface $user)
    {
        $this->user = $user;
        $this->session = $session;
        $this->manager = $manager;
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
     * @return bool
     * @throws Exception
     */
    public function update(Player $player, Answer $answer): bool
    {
        $turn = new TurnSystemService($this->manager,$this->session, $this->user);
        $endGame = $turn->turnSystem();

        $effectPlayers = $answer->getEffectPlayers();

        foreach ($effectPlayers as $effectPlayer){
            switch ($effectPlayer->getCharacteristicPlayer()){
                case 'mood':
                    $player->setMood($player->getMood() + $effectPlayer->getValueEffectPlayer());
                    $this->manager->flush();
                    break;
                case 'sleep':
                    $player->setSleep($player->getSleep() + $effectPlayer->getValueEffectPlayer());
                    $this->manager->flush();
                    break;
                case 'charisma':
                    $player->setCharisma($player->getCharisma() + $effectPlayer->getValueEffectPlayer());
                    $this->manager->flush();
                    break;
                case 'pedagogy':
                    $player->setPedagogy($player->getPedagogy() + $effectPlayer->getValueEffectPlayer());
                    $this->manager->flush();
                    break;
                default:
                    throw new Exception('Player Characteristic don\'t match');
            }
        }

        return $endGame;
    }
}