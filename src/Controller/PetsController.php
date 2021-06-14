<?php

namespace App\Controller;

use App\Entity\PetForAdoption;
use App\Repository\PetForAdoptionRepository;
use App\Service\Cart\PetCartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("")
 */
class PetsController extends AbstractController
{
    /**
     * @Route("/pets",name= "pets")
     */
    #hello
    public function index(): Response
    {
        $repository= $this->getDoctrine()->getRepository(PetForAdoption::class);
        $cats =$repository->findBy(array('kind' => 'cat'));
        $dogs =$repository->findBy(array('kind' => 'dog'));
        $birds =$repository->findBy(array('kind' => 'bird'));
        $rabbits =$repository->findBy(array('kind' => 'rabbit'));
        return $this->render('pets/index.html.twig', [
            'controller_name' => 'PetsController','cats' => $cats,
            'dogs' => $dogs , 'birds' => $birds, 'rabbits' => $rabbits
        ]);
    }

    /**
     * @Route("/list",name= "petsList")
     */
    public function showMe(): Response
    {
        $repository= $this->getDoctrine()->getRepository(PetForAdoption::class);
        $pets =$repository->findAll();
        return $this->render('pets/list.html.twig', [
            'controller_name' => 'PetsController','pets' => $pets
        ]);
    }

    /**
     * @Route("/favorites",name="pet_cart_index")
     */
    public function favorites(PetCartService  $petCartService)
    {
        return $this->render('pets/wishlist.html.twig',[
            'favorites'=> $petCartService->getFullCart(),
        ]);

    }




    /**
     * @Route("/favorites/add/{id}",name="pet_cart_add")
     */
    public function add($id,PetCartService  $petCartService)
    {
        $petCartService->add($id);
        return $this->redirectToroute("pet_cart_index");

    }

    /**
     * @Route("/favorites/remove/{id}", name="pet_cart_remove")
     */

    public function remove($id, PetCartService $petCartService){
        $petCartService->remove($id);

        return $this->redirectToRoute("pet_cart_index");
    }

}
