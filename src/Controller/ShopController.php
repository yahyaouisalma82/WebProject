<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{


    /**
     * @Route("/dog", name="dog.list")
     */
    public function dog(): Response
    {
        $repository = $this->getDoctrine()->getRepository('App:Product');
        $products = $repository->findBy([], []);
        return $this->render('shop/dog.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/cat", name="cat.list")
     */
    public function cat( ): Response
    {
        $repository = $this->getDoctrine()->getRepository('App:Product');
        $products = $repository->findBy([], []);
        return $this->render('shop/cat.html.twig', [
            'products' => $products
        ]);
    }
    /**
     * @Route("/fish", name="fish.list")
     */
    public function fish( ): Response
    {
        $repository = $this->getDoctrine()->getRepository('App:Product');
        $products = $repository->findBy([], []);
        return $this->render('shop/fish.html.twig', [
            'products' => $products
        ]);
    }



    /**
     * @Route("/bird", name="bird.list")
     */
    public function bird( ): Response
    {
        $repository = $this->getDoctrine()->getRepository('App:Product');
        $products = $repository->findBy([], []);
        return $this->render('shop/bird.html.twig', [
            'products' => $products
        ]);
    }
}
