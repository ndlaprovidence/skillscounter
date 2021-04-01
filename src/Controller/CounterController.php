<?php

namespace App\Controller;

use App\Entity\Counter;
use App\Form\CounterType;
use App\Repository\CounterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/*
 * @Route("/counter")
 */
class CounterController extends AbstractController
{
    /**
     * @Route("/counter", name="counter_index", methods={"GET"})
     */
    public function index(CounterRepository $counterRepository): Response
    {
        return $this->render('counter/index.html.twig', [
            'counters' => $counterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="counter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $counter = new Counter();
        $form = $this->createForm(CounterType::class, $counter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($counter);
            $entityManager->flush();

            return $this->redirectToRoute('counter_index');
        }

        return $this->render('counter/new.html.twig', [
            'counter' => $counter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="counter_show", methods={"GET"})
     */
    public function show(Counter $counter): Response
    {
        return $this->render('counter/show.html.twig', [
            'counter' => $counter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="counter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Counter $counter): Response
    {
        $form = $this->createForm(CounterType::class, $counter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('counter_index');
        }

        return $this->render('counter/edit.html.twig', [
            'counter' => $counter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="counter_delete", methods={"POST"})
     */
    public function delete(Request $request, Counter $counter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$counter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($counter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('counter_index');
    }
}
