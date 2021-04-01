<?php

namespace App\Controller;

use App\Entity\Fiches;
use App\Form\FichesType;
use App\Repository\FichesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/form/fiches")
 */
class FormFichesController extends AbstractController
{
    /**
     * @Route("/", name="form_fiches_index", methods={"GET"})
     */
    public function index(FichesRepository $fichesRepository): Response
    {
        return $this->render('form_fiches/index.html.twig', [
            'fiches' => $fichesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="form_fiches_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fich = new Fiches();
        $form = $this->createForm(FichesType::class, $fich);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fich);
            $entityManager->flush();

            return $this->redirectToRoute('form_fiches_index');
        }

        return $this->render('form_fiches/new.html.twig', [
            'fich' => $fich,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="form_fiches_show", methods={"GET"})
     */
    public function show(Fiches $fich): Response
    {
        return $this->render('form_fiches/show.html.twig', [
            'fich' => $fich,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="form_fiches_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fiches $fich): Response
    {
        $form = $this->createForm(FichesType::class, $fich);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('form_fiches_index');
        }

        return $this->render('form_fiches/edit.html.twig', [
            'fich' => $fich,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="form_fiches_delete", methods={"POST"})
     */
    public function delete(Request $request, Fiches $fich): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fich->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fich);
            $entityManager->flush();
        }

        return $this->redirectToRoute('form_fiches_index');
    }
}
