<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{


    /**
     * @Route("/dog/{page<\d+>?1}/{number<\d+>?6}", name="dog.list")
     */
    public function dog($page, $number): Response
    {
        $repository = $this->getDoctrine()->getRepository('App:Product');
        $products = $repository->findBy([], ['price'=> 'asc'],$number, ($page - 1) * $number);
        return $this->render('shop/dog.html.twig', [
            'products' => $products
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
