<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TacheController extends AbstractController
{
    /**
     * @Route("/tache", name="app_tache")
     */
    public function index(): Response
    {
        return $this->render('tache/index.html.twig', [
            'controller_name' => 'TacheController',
        ]);
    }


    /**
     * @Route("/tache/listeTaches", name="tache/listeTaches")
     */
    public function listeTaches(EntityManagerInterface $manager): Response
    {
        $Tache=$manager->getRepository(Tache::class)->findAll();
        return $this->render('tache/listeTaches.html.twig',['listTaches' => $Tache]);
    }


    /**
    * @Route("/supprTaches/{id}",name="supprTaches")
    */
    public function supprTaches(EntityManagerInterface $manager,Tache $editutil): Response
    {
        $manager->remove($editutil);
        $manager->flush();
        return $this->redirectToRoute ('tache/index.html.twig');
    }


    /**
     * @Route("/tache/creerTache", name="tache/creerTache")
     */
    public function creerTache(): Response
    {
        return $this->render('tache/creerTache.html.twig', [
            'controller_name' => 'tacheController',
        ]);
}


    /**
     * @Route("/tache/insertTache", name="/tache/insertTache")
     */
    public function insertTache(Request $request, EntityManagerInterface $manager): Response
    {
        $newTache = new Tache();
        $Tache = $request -> request -> get("Tache");
        $manager->persist($newTache);
        $manager->flush();

        $text = "La nouvelle tache a été insérée !";

       return $this->render('tache/insertTache.html.twig', [
            'text' => $text,
        ]);
    }
}
