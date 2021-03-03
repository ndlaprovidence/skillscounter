<?php

namespace App\Controller;

use App\Entity\SchoolNotes;
use App\Form\SchoolNotesType;
use App\Repository\SchoolNotesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/school/notes")
 */
class SchoolNotesController extends AbstractController
{
    /**
     * @Route("/", name="school_notes_index", methods={"GET"})
     */
    public function index(SchoolNotesRepository $schoolNotesRepository): Response
    {
        return $this->render('school_notes/index.html.twig', [
            'school_notes' => $schoolNotesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="school_notes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $schoolNote = new SchoolNotes();
        $form = $this->createForm(SchoolNotesType::class, $schoolNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($schoolNote);
            $entityManager->flush();

            return $this->redirectToRoute('school_notes_index');
        }

        return $this->render('school_notes/new.html.twig', [
            'school_note' => $schoolNote,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_notes_show", methods={"GET"})
     */
    public function show(SchoolNotes $schoolNote): Response
    {
        return $this->render('school_notes/show.html.twig', [
            'school_note' => $schoolNote,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="school_notes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SchoolNotes $schoolNote): Response
    {
        $form = $this->createForm(SchoolNotesType::class, $schoolNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('school_notes_index');
        }

        return $this->render('school_notes/edit.html.twig', [
            'school_note' => $schoolNote,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_notes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SchoolNotes $schoolNote): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schoolNote->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($schoolNote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('school_notes_index');
    }
}
