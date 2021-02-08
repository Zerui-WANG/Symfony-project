<?php

namespace App\Controller;

use App\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerUpdateController extends AbstractController
{
    /**
     * @Route("/player/{id}", name="playerUpdate")
     */
    public function update(Player $player) :Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        if (!$player) {
            throw $this->createNotFoundException(
                'No player found for id ' . $player->getId()
            );
        }

        $player->setPedagogy($player->getPedagogy() + 5);
        $entityManager->flush();

        return $this->render('player/index.html.twig', [
            'player' => $player,
        ]);

    }

}
