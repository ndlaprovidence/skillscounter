<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountersController extends AbstractController
{
    /**
     * @Route("/counters", name="counters")
     */
    public function index(): Response
    {
        return $this->render('counters/index.html.twig', [
            'newNote1' => 19,
            'newNote2' => 12.5,
            'newNote3' => 10,
            'newNote4' => 7.5,
            'oldNote1' => 12.5,
            'oldNote2' => 13,
            'oldNote3' => 16.5,
            'oldNote4' => 10,
        ]);
    }
}
