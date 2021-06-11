<?php

namespace App\Controller;

use App\Entity\PetForAdoption;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        $fishs =$repository->findBy(array('kind' => 'fish'));
        return $this->render('pets/index.html.twig', [
            'controller_name' => 'PetsController','cats' => $cats,
            'dogs' => $dogs , 'birds' => $birds, 'fishs' => $fishs
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
}
