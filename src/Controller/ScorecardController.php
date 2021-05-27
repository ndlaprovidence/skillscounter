<?php

namespace App\Controller;

use App\Entity\Scorecard;
use App\Form\ScorecardType;
use App\Repository\ScorecardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scorecard")
 */
class ScorecardController extends AbstractController
{
    /**
     * @Route("/", name="scorecard_index", methods={"GET"})
     */
    public function index(ScorecardRepository $scorecardRepository): Response
    {
        return $this->render('scorecard/index.html.twig', [
            'scorecards' => $scorecardRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scorecard_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scorecard = new Scorecard();
        $form = $this->createForm(ScorecardType::class, $scorecard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scorecard);
            $entityManager->flush();

            return $this->redirectToRoute('scorecard_index');
        }

        return $this->render('scorecard/new.html.twig', [
            'scorecard' => $scorecard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scorecard_show", methods={"GET"})
     */
    public function show(Scorecard $scorecard): Response
    {
        return $this->render('scorecard/show.html.twig', [
            'scorecard' => $scorecard,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scorecard_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Scorecard $scorecard): Response
    {
        $form = $this->createForm(ScorecardType::class, $scorecard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scorecard_index');
        }

        return $this->render('scorecard/edit.html.twig', [
            'scorecard' => $scorecard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scorecard_delete", methods={"POST"})
     */
    public function delete(Request $request, Scorecard $scorecard): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scorecard->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scorecard);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scorecard_index');
    }
}
