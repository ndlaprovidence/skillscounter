<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/classroom")
 */
class ClassroomController extends AbstractController
{
    /**
     * @Route("/", name="classroom_index", methods={"GET"})
     */
    public function index(ClassroomRepository $classroomRepository): Response
    {
        return $this->render('classroom/index.html.twig', [
            'classrooms' => $classroomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="classroom_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $classroom = new Classroom();
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($classroom);
            $entityManager->flush();

            return $this->redirectToRoute('classroom_index');
        }

        return $this->render('classroom/new.html.twig', [
            'classroom' => $classroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="classroom_show", methods={"GET"})
     */
    public function show(Classroom $classroom): Response
    {
        return $this->render('classroom/show.html.twig', [
            'classroom' => $classroom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="classroom_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Classroom $classroom): Response
    {
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('classroom_index');
        }

        return $this->render('classroom/edit.html.twig', [
            'classroom' => $classroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="classroom_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Classroom $classroom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classroom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($classroom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('classroom_index');
    }
}
