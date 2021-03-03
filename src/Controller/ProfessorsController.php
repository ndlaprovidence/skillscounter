<?php

namespace App\Controller;

use App\Entity\Professors;
use App\Form\ProfessorsType;
use App\Repository\ProfessorsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/professors")
 */
class ProfessorsController extends AbstractController
{
    /**
     * @Route("/", name="professors_index", methods={"GET"})
     */
    public function index(ProfessorsRepository $professorsRepository): Response
    {
        return $this->render('professors/index.html.twig', [
            'professors' => $professorsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="professors_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $professor = new Professors();
        $form = $this->createForm(ProfessorsType::class, $professor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($professor);
            $entityManager->flush();

            return $this->redirectToRoute('professors_index');
        }

        return $this->render('professors/new.html.twig', [
            'professor' => $professor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professors_show", methods={"GET"})
     */
    public function show(Professors $professor): Response
    {
        return $this->render('professors/show.html.twig', [
            'professor' => $professor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="professors_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Professors $professor): Response
    {
        $form = $this->createForm(ProfessorsType::class, $professor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('professors_index');
        }

        return $this->render('professors/edit.html.twig', [
            'professor' => $professor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professors_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Professors $professor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$professor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($professor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professors_index');
    }
}
