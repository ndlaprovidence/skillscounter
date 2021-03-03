<?php

namespace App\Controller;

use App\Entity\Schoolsubjects;
use App\Form\SchoolsubjectsType;
use App\Repository\SchoolsubjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/schoolsubjects")
 */
class SchoolsubjectsController extends AbstractController
{
    /**
     * @Route("/", name="schoolsubjects_index", methods={"GET"})
     */
    public function index(SchoolsubjectsRepository $schoolsubjectsRepository): Response
    {
        return $this->render('schoolsubjects/index.html.twig', [
            'schoolsubjects' => $schoolsubjectsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="schoolsubjects_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $schoolsubject = new Schoolsubjects();
        $form = $this->createForm(SchoolsubjectsType::class, $schoolsubject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($schoolsubject);
            $entityManager->flush();

            return $this->redirectToRoute('schoolsubjects_index');
        }

        return $this->render('schoolsubjects/new.html.twig', [
            'schoolsubject' => $schoolsubject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schoolsubjects_show", methods={"GET"})
     */
    public function show(Schoolsubjects $schoolsubject): Response
    {
        return $this->render('schoolsubjects/show.html.twig', [
            'schoolsubject' => $schoolsubject,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="schoolsubjects_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Schoolsubjects $schoolsubject): Response
    {
        $form = $this->createForm(SchoolsubjectsType::class, $schoolsubject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('schoolsubjects_index');
        }

        return $this->render('schoolsubjects/edit.html.twig', [
            'schoolsubject' => $schoolsubject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schoolsubjects_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Schoolsubjects $schoolsubject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schoolsubject->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($schoolsubject);
            $entityManager->flush();
        }

        return $this->redirectToRoute('schoolsubjects_index');
    }
}
