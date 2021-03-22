<?php

namespace App\Controller;

use App\Entity\EffectStudent;
use App\Form\EffectStudentType;
use App\Repository\EffectStudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/effect/student")
 */
class EffectStudentController extends AbstractController
{
    /**
     * @Route("/", name="effect_student_index", methods={"GET"})
     * @param EffectStudentRepository $effectStudentRepository
     * @return Response
     */
    public function index(EffectStudentRepository $effectStudentRepository): Response
    {
        return $this->render('effect_student/index.html.twig', [
            'effect_students' => $effectStudentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="effect_student_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $effectStudent = new EffectStudent();
        $form = $this->createForm(EffectStudentType::class, $effectStudent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($effectStudent);
            $entityManager->flush();

            return $this->redirectToRoute('effect_student_index');
        }

        return $this->render('effect_student/new.html.twig', [
            'effect_student' => $effectStudent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="effect_student_show", methods={"GET"})
     * @param EffectStudent $effectStudent
     * @return Response
     */
    public function show(EffectStudent $effectStudent): Response
    {
        return $this->render('effect_student/show.html.twig', [
            'effect_student' => $effectStudent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="effect_student_edit", methods={"GET","POST"})
     * @param Request $request
     * @param EffectStudent $effectStudent
     * @return Response
     */
    public function edit(Request $request, EffectStudent $effectStudent): Response
    {
        $form = $this->createForm(EffectStudentType::class, $effectStudent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('effect_student_index');
        }

        return $this->render('effect_student/edit.html.twig', [
            'effect_student' => $effectStudent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="effect_student_delete", methods={"DELETE"})
     * @param Request $request
     * @param EffectStudent $effectStudent
     * @return Response
     */
    public function delete(Request $request, EffectStudent $effectStudent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$effectStudent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($effectStudent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('effect_student_index');
    }
}
