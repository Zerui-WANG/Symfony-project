<?php

namespace App\Controller;

use App\Entity\Action;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoomController extends AbstractController
{
    /**
     * @Route("/boom", name= "boom")
     */
  ///  # [Route("/boom", name: "boom")]
    public function index(): Response
    {
        $students= $this->getDoctrine()
            ->getRepository('App:Student')
            ->findBy(
                ['game' => $this->getUser()->getGame()]
            );

        $actionsMatin = $this->getDoctrine()->getRepository(Action::class)
            ->findBy([
                'game' => $this->getUser()->getGame(),
                'actionPeriod' => 'matin',
            ]);
        $actionsMidi = $this->getDoctrine()->getRepository(Action::class)
            ->findBy([
                'game' => $this->getUser()->getGame(),
                'actionPeriod' => 'midi',
            ]);
        $dayTime = $this->getUser()->getGame()->getDayTime();

        return $this->render("boom/index.html.twig", [
            'students' => $students,
            'dayTime' => $dayTime,
            'actionsMatin' => $actionsMatin,
            'actionsMidi' => $actionsMidi
        ]);
    }

    /**
     * Route("/test/{name?World}",name = "boomName")
     */
 /*   public function name($name):Response
    {
        return new Response("Hello ". $name);
    }

*/
    /**
     * @Route("/boom/1", name= "array")
     * @param StudentRepository $repo
     * @return Response
     */
    public function arrayStudent(StudentRepository $repo) :Response
    {
        return $this->render('boom/index.html.twig',[$repo->findAll()]);
    }


    /**
     * @Route("/boom/2", name= "arrayvide")
     */
    public function arrayS(): Response
    {
        $students= $this->getDoctrine()
            ->getRepository('App:Student')
            ->findBy(
                ['game' => $this->getUser()->getGame()]
            );

        return $this->render("boom/index.html.twig", [
            'students' => $students,
        ]);

    }
}
