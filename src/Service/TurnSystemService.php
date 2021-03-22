<?php

namespace App\Service;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class TurnSystemService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;
    /**
     * @var SessionInterface
     */
    private SessionInterface $session;
    /**
     * @var UserInterface
     */
    private UserInterface $user;

    public function __construct(EntityManagerInterface $manager, SessionInterface $session, UserInterface $user)
    {
        $this->manager = $manager;
        $this->session = $session;
        $this->user = $user;
    }

    public function eventActivation(): ?object
    {
        $game = $this->user->getGame();
        $currentTurn = $game->getTurn();

        if ($this->session->get('passedTurn') == $currentTurn || $this->session == null) {
            return null;
        }

        $events = $this->manager->getRepository(Event::class)->findBy([
            'game' => $game,
        ]);
        $this->session->set('passedTurn', $currentTurn);
        return $events[array_rand($events, 1)];
    }

    public function turnSystem()
    {
        $dayTime = $this->user->getGame()->getDayTime();
        if($dayTime < 2){
            $this->user->getGame()->setDayTime($dayTime + 1);
        }else{
            $currentTurn = $this->user->getGame()->getTurn();
            /*
            if($currentTurn < 1){

            }*/
            $this->user->getGame()->setTurn($currentTurn - 1);
            $this->user->getGame()->setDayTime(0);
        }
    }
}
