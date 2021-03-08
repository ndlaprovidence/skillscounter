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
            'controller_name' => 'CountersController',
        ]);
    }
}
