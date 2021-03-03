<?php

namespace App\Controller;

use App\Entity\Students;
use App\Form\StudentsType;
use App\Repository\ParentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/students")
 */
class StudentsController extends AbstractController
{
    /**
     * @Route("/", name="students_index", methods={"GET"})
     */
    public function index(ParentsRepository $parentsRepository): Response
    {
        return $this->render('students/index.html.twig', [
            'students' => $parentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="students_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $student = new Students();
        $form = $this->createForm(StudentsType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($student);
            $entityManager->flush();

            return $this->redirectToRoute('students_index');
        }

        return $this->render('students/new.html.twig', [
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="students_show", methods={"GET"})
     */
    public function show(Students $student): Response
    {
        return $this->render('students/show.html.twig', [
            'student' => $student,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="students_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Students $student): Response
    {
        $form = $this->createForm(StudentsType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('students_index');
        }

        return $this->render('students/edit.html.twig', [
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="students_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Students $student): Response
    {
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($student);
            $entityManager->flush();
        }

        return $this->redirectToRoute('students_index');
    }
}
