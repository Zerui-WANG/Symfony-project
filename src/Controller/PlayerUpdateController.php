<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Player;
use App\Service\PlayerService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class PlayerUpdateController extends AbstractController
{
    /**
     * @Route("/player/update/{idAnswer}", name="playerUpdate")
     * @param int $idAnswer
     * @param EntityManagerInterface $manager
     * @param UserInterface $user
     * @param SessionInterface $session
     * @return Response
     * @throws Exception
     */
    public function update(int $idAnswer, EntityManagerInterface $manager,
                           UserInterface $user, SessionInterface $session) :Response
    {
        $game = $this->getUser()->getGame();
        $player = $game->getPlayer();

        if (!$player) {
            throw $this->createNotFoundException(
                'No player found for id ' . $player->getId()
            );
        }

        $answer = $this->getDoctrine()
            ->getRepository(Answer::class)
            ->find($idAnswer);

        $playerService = new PlayerService($manager, $session, $user);
        $playerService->update($player, $answer);

        return $this->render('desktop/index.html.twig', [
            'game' => $game
        ]);
    }
}
