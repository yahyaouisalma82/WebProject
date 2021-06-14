<?php

namespace App\Controller;

use App\Entity\Account;
use App\Entity\User;
use App\Form\AccountType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(EntityManagerInterface $manager,Request $request): Response
    {
        $user=new Account();
        $form=$this->createForm(AccountType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager->persist($user);
            $manager->flush();
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'user'=>$user,
            'form'=>$form->createView()
        ]);
    }
    /*public function addUser(EntityManagerInterface $manager)
    {
        $user=new User();
        $form=$this->createForm(UserType::class,$user);
        return $this->render('home/index.html.twig',[
            'user'=>$user,
            'form'=>$form->createView()
        ]);
    }*/
}
