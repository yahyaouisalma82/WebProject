<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop')]
    public function index(): Response
    {
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
        ]);
    }

    /**
     * @Route("/dog",name= "dog")
     */

    public function dog(): Response
    {
        return $this->render('shop/dog.html.twig', [
            'controller_name' => 'shopController',
        ]);
    }

    /**
     * @Route("/cat",name= "cat")
     */
    public function cat(): Response
    {
        return $this->render('shop/cat.html.twig', [
            'controller_name' => 'shopController',
        ]);
    }

    /**
     * @Route("/fish",name= "fish")
     */
    public function fish(): Response
    {
        return $this->render('shop/fish.html.twig', [
            'controller_name' => 'shopController',
        ]);
    }

    /**
     * @Route("/bird",name= "bird")
     */
    public function bird(): Response
    {
        return $this->render('shop/bird.html.twig', [
            'controller_name' => 'shopController',
        ]);
    }
}
