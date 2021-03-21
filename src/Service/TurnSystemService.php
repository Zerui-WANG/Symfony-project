<?php

namespace App\Service;

use App\Entity\Event;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class TurnSystemService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;
    /**
     * @var SessionInterface
     */
    private SessionInterface $session;

    public function __construct(EntityManagerInterface $em, SessionInterface $session)
    {
        $this->em = $em;
        $this->session = $session;
    }

    public function eventActivation(UserInterface $user): ?object
    {
        $game = $user->getGame();
        $currentTurn = $game->getTurn();

        if ($this->session->get('passedTurn') == $currentTurn || $this->session == null) {
            return null;
        }

        $events = $this->em->getRepository(Event::class)->findBy([
    //        'game' => $game,
        ]);
        $this->session->set('passedTurn', $currentTurn);
        return $events[array_rand($events, 1)];
    }
}
