<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity;
use Symfony\Component\HttpFoundation\Request;

/**
 * klasa odpowiada za obsluge koszyka zakupow. Wyswietla liczbe dostepnych elementow
 * oraz wszystkie elementy ktore oczekuja na zamowienie
 * @author Sebastian Szymczyna
 */
class CartController extends Controller{

    /**
     * funkcja podaje liczbe elementow, ktore obecnie znajduja sie w koszyku
     * zamowien
     * @param Request $request
     * @return type array('num' =>$num) zwraca liczbe elementow
     */
     public function getAction(Request $request){
         
        $session = $this->getRequest()->getSession();
        $num =$session->get('orderNumber');
        
         return $this->render('UekVodBundle::cartNumber.html.twig', array('num' =>$num));
    }
    /**
     * funkcja wyszukuje obecna zawartosc koszyka (parametry sesji).
     * Rowniez generowany jest formularz odpowiadajacy za usuniece elementow z koszyka
     * @param Request $request
     * @return type array('price' => $price,'name' => $name, 'formReview' => $formReview->createView())
     * price - akutalna cena zamowien
     * name - tablica filmow w koszyku
     */
    
    public function showAction(Request $request){
        
        $session = $this->getRequest()->getSession();
        
        $name =$session->get('numberFilm');
        $orderNumber =$session->get('orderNumber');
        $price =$session->get('price');
        
        $formReview = $this->createFormBuilder()->getForm();
        $formReview->handleRequest($request);
        
        
            //usuwanie elementow z koszyka
        if ($formReview->isValid()) {
            for($i=0;$i<=$orderNumber;$i++){
                unset ($name[$i]);
            }
            $orderNumber = 0;
            $price = 0;
   
            $session->set('orderNumber', $orderNumber);
            $session->set('numberFilm', $name);
            $session->set('price', $price);
        }
        return $this->render('UekVodBundle:Default:cart.html.twig', array('price' => $price,'name' => $name, 'formReview' => $formReview->createView()));
    }
}