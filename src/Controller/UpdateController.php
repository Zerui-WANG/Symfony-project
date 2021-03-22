<?php

namespace App\Controller;

use App\Entity\Answer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateController extends AbstractController
{
    /**
     * @Route("/update/{idAnswer}", name="update")
     * @param int $idAnswer
     * @return Response
     */
    public function index(int $idAnswer)
    {
        $answer = $this->getDoctrine()->getRepository(Answer::class)->find($idAnswer);
        $effects = $answer->getEffectPlayers()->getValues();
        if(empty($effects)){
            $response = $this->forward('App\Controller\StudentUpdateController::update', [
                'idAnswer'  => $idAnswer
            ]);
        }
        else{
            $response = $this->forward('App\Controller\PlayerUpdateController::update', [
                'idAnswer'  => $idAnswer
            ]);
        }

        return $response;
    }
}
