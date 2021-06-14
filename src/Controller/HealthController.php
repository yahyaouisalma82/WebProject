<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthController extends AbstractController
{
    #[Route('/health', name: 'health')]
    public function index(): Response
    {
        return $this->render('health/index.html.twig', [
            'controller_name' => 'HealthController',
        ]);
    }

    #[Route('/skinissues', name: 'skinissues')]
    public function skinissues(): Response
    {
        return $this->render('health/skinissues.html.twig', [
            'controller_name' => 'HealthController',
        ]);
    }
    #[Route('/dogsick', name: 'dogsick')]
    public function dogsick(): Response
    {
        return $this->render('health/dogsick.html.twig', [
            'controller_name' => 'HealthController',
        ]);
    }
    #[Route('/catsick', name: 'catsick')]
    public function catsick(): Response
    {
        return $this->render('health/catsick.html.twig', [
            'controller_name' => 'HealthController',
        ]);
    }
    #[Route('/catfood', name: 'catfood')]
    public function catfood(): Response
    {
        return $this->render('health/catfood.html.twig', [
            'controller_name' => 'HealthController',
        ]);
    }
    #[Route('/catage', name: 'catage')]
    public function catage(): Response
    {
        return $this->render('health/catage.html.twig', [
            'controller_name' => 'HealthController',
        ]);
    }
    #[Route('/dogage', name: 'dogage')]
    public function dogage(): Response
    {
        return $this->render('health/dogage.html.twig', [
            'controller_name' => 'HealthController',
        ]);
    }

}
