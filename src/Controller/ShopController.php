<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{

    /**
     * @Route("/panier",name="cart_index")
     */
    public function index(SessionInterface $session,ProductRepository $productRepository){
        $panier=$session->get('panier',[]);
        $panierWithData=[];
        foreach($panier as $id => $quantity){
            $panierWithData[]=[
                'product'=>$productRepository->find($id),
                'quantity' =>$quantity
            ];

        }
        $total=0;
        foreach($panierWithData as $item){
            $totalItem=$item['product']->getPrice()* $item['quantity'];
            $total+=$totalItem;
        }
        return $this->render('shop/panier.html.twig',[
            'items'=> $panierWithData,
            'total'=>$total
        ]);
    }
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
     * @Route("/panier/add/{id}",name="cart_add")
     */
    public function add($id,Request $request,SessionInterface $session){

        $session =$request->getSession();

        $panier=$session->get('panier',[]);

        if(!empty($panier[$id])){
            $panier[$id]++;

        }else{
            $panier[$id]=1;
        }



        $session->set('panier',$panier);





    }
}
