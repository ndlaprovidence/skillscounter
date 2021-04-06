<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Form\EvaluationType;
use App\Repository\EvaluationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/evaluation")
 */
class EvaluationController extends AbstractController
{
    /**
     * @Route("/", name="evaluation_index", methods={"GET"})
     */
    public function index(EvaluationRepository $evaluationRepository): Response
    {
        return $this->render('evaluation/index.html.twig', [
            'evaluations' => $evaluationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="evaluation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $evaluation = new Evaluation();
        $form = $this->createForm(EvaluationType::class, $evaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evaluation);
            $entityManager->flush();

            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/new.html.twig', [
            'evaluation' => $evaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluation_show", methods={"GET"})
     */
    public function show(Evaluation $evaluation): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $sqlResultPreviousEvaluation = $this->getDoctrine()
            ->getRepository(Evaluation::class)
            ->findPreviousEvaluation($evaluation->getStudent(), $evaluation->getDateEvaluation());

        if ($sqlResultPreviousEvaluation != null) {

            $previousEvaluation = $sqlResultPreviousEvaluation[0];

            return $this->render('evaluation/show.html.twig', [
                'evaluation' => $evaluation,
                'oldNote1' => $previousEvaluation->getValueNote1(),
                'oldNote2' => $previousEvaluation->getValueNote2(),
                'oldNote3' => $previousEvaluation->getValueNote3(),
                'oldNote4' => $previousEvaluation->getValueNote4(),
                'datePreviousEvaluation' => $previousEvaluation->getDateEvaluation(),
            ]);
        }
        else {
            return $this->render('evaluation/show.html.twig', [
                'evaluation' => $evaluation,
                'oldNote1' => -1,
                'oldNote2' => -1,
                'oldNote3' => -1,
                'oldNote4' => -1,
            ]);
        }
    }

    /**
     * @Route("/{id}/edit", name="evaluation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Evaluation $evaluation): Response
    {
        $form = $this->createForm(EvaluationType::class, $evaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/edit.html.twig', [
            'evaluation' => $evaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluation_delete", methods={"POST"})
     */
    public function delete(Request $request, Evaluation $evaluation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evaluation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evaluation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evaluation_index');
    }
}
