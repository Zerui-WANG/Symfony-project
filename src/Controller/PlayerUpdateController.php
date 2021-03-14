<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Player;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerUpdateController extends AbstractController
{
    /**
     * @Route("/player/update/{idAnswer}", name="playerUpdate")
     * @param int $idAnswer
     * @return Response
     * @throws Exception
     */
    public function update(int $idAnswer) :Response
    {
        $player = $this->getDoctrine()
            ->getRepository(Player::class)
            ->find($this->getUser()->getGame()->getPlayer());

        $entityManager = $this->getDoctrine()->getManager();

        if (!$player) {
            throw $this->createNotFoundException(
                'No player found for id ' . $player->getId()
            );
        }

        $answer = $this->getDoctrine()
            ->getRepository(Answer::class)
            ->find($idAnswer);

        $this->getDoctrine()->getRepository(Player::class)
            ->update($player, $answer, $entityManager);

        return $this->render('player/index.html.twig', [
            'player' => $player,
        ]);
    }
}
