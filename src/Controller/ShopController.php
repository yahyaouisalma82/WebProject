<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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


    /**
     * @Route("/panier",name="cart_index")
     */
    public function index(CartService $cartService){
       return $this->render('shop/panier.html.twig',[
           'items'=> $cartService->getFullCart(),
           'total'=>$cartService->getTotal()
       ]);

    }




    /**
     * @Route("/panier/add/{id}",name="cart_add")
     */
    public function add($id,CartService $cartService){
        $cartService->add($id);
        return $this->redirectToroute("cart_index");

    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */

    public function remove($id, CartService $cartService){
        $cartService->remove($id);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/submit",name="submit")
     */
    public function submit(SessionInterface $session){
        $this->addFlash('success', "votre commande sera disponible dans notre boutique");
        return $this->render("shop/submit.html.twig", []);
    }

}
