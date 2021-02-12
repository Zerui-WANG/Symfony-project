<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
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
        return $this->render('boom/index.html.twig', [
            'controller_name' => 'BoomController',
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
     */
    public function arrayStudent(StudentRepository $repo) :Response
    {
        return $this->render('boom/index.html.twig',[$repo->findAll()]);
    }


    /**
     * @Route("/boom/2", name= "arrayvide")
     */
    public function arrayS()
    {
        $students= $this->getDoctrine()
            ->getRepository('App:Student')
            ->findByGame(1);

        dd($students);
        return $this->render("boom/index.html.twig", array(
            'students' => $students,
        ));

    }
}
