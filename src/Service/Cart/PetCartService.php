<?php

namespace App\Service\Cart;

use App\Repository\PetForAdoptionRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class PetCartService{

    protected $session;
    protected $petForAdoptionRepository;

    public function __construct(SessionInterface $session , PetForAdoptionRepository $petForAdoptionRepository ){
        $this->session = $session;
        $this->petForAdoptionRepository=$petForAdoptionRepository;
    }

    public function add(int $id){
        $favorites = $this->session->get('favorites',[]);

        if(!empty($favorites[$id])){
            $favorites[$id]++;

        }else{
            $favorites[$id]=1;
        }

        $this->session->set('favorites',$favorites);
    }

    public function remove(int $id){
        $favorites = $this->session->get('favorites' , []);
        if(!empty($favorites[$id])){
            unset ($favorites[$id]);
        }
        $this->session->set('favorites', $favorites);
    }

    public function getFullCart() : array {
        $favorites=$this->session->get('favorites',[]);
        $favoritesWithData=[];
        foreach($favorites as $id){
            $favoritesWithData[]=[
                'pet' =>$this->petForAdoptionRepository->find($id),
            ];
        }
        return $favoritesWithData;
    }

}