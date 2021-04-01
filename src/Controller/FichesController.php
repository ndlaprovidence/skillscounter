<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class FichesController extends AbstractController
{
    /**
     * @Route("/fiches", name="fiches")
     */
    public function index(): Response
    {
        return $this->render('fiches/index.html.twig', [
            'controller_name' => 'FichesController',
        ]);
    }
    /**
     * @Route("/delete", name="delete")
     */
    public function delete(): Response
    {
        return $this->render('fiches/delete.html.twig', [
            'controller_name' => 'FichesController',
        ]);
    }
    public function modify(): Response
    {
        

    }
    /**
     * @Route("/BTS", name="BTS")
     */
    public function bts(): Response
    {
        return $this->render('fiches/bts.html.twig', [
            'controller_name' => 'FichesController',
        ]);
    }
}
