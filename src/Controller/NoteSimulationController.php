<?php

namespace App\Controller;

use App\Entity\NoteSimulation;
use App\Form\NoteSimulationType;
use App\Repository\NoteSimulationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/noteSimulation")
 */
class NoteSimulationController extends AbstractController
{
    /**
     * @Route("/", name="note_simulation_index", methods={"GET"})
     */
    public function index(NoteSimulationRepository $noteSimulationRepository): Response
    {
        return $this->render('note_simulation/index.html.twig', [
            'note_simulations' => $noteSimulationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="note_simulation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $noteSimulation = new NoteSimulation();
        $form = $this->createForm(NoteSimulationType::class, $noteSimulation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($noteSimulation);
            $entityManager->flush();

            return $this->redirectToRoute('note_simulation_index');
        }

        return $this->render('note_simulation/new.html.twig', [
            'note_simulation' => $noteSimulation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="note_simulation_show", methods={"GET"})
     */
    public function show(NoteSimulation $noteSimulation): Response
    {
        return $this->render('note_simulation/show.html.twig', [
            'note_simulation' => $noteSimulation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="note_simulation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, NoteSimulation $noteSimulation,  NotifierInterface $notifier): Response
    {
        $form = $this->createForm(NoteSimulationType::class, $noteSimulation);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();
            $notifier->send(new Notification('Simulation bien enregistrée', ['browser']));
            return $this->render('note_simulation/show.html.twig', [
                'note_simulation' => $noteSimulation,
            ]);
        }

        return $this->render('note_simulation/edit.html.twig', [
            'note_simulation' => $noteSimulation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="note_simulation_delete", methods={"POST"})
     */
    public function delete(Request $request, NoteSimulation $noteSimulation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$noteSimulation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($noteSimulation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('note_simulation_index');
    }
}
