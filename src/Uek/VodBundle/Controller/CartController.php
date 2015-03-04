<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller{
    public function delAction($title){


    }
    
     public function getAction(Request $request){
         
        $session = $this->getRequest()->getSession();
        
        $num =$session->get('orderNumber');


 //           return $this->redirect($this->generateUrl('task_success',array('id'=>$id)));

        
         return $this->render('UekVodBundle::test.html.twig', array('num' =>$num));
    }
    
         public function showAction(Request $request){
         
     
          $session = $this->getRequest()->getSession();
        
        $name =$session->get('numberFilm');
        $orderNumber =$session->get('orderNumber');
        
       $formReview = $this->createFormBuilder()->getForm();
        $formReview->handleRequest($request);
        
        if ($formReview->isValid()) {
            for($i=0;$i<=$orderNumber;$i++){
                unset ($name[$i]);
            }
        $orderNumber = 0;
   
        $session->set('orderNumber', $orderNumber);
        $session->set('numberFilm', $name);
            
            }
        return $this->render('UekVodBundle:Default:cart.html.twig', array('name' => $name, 'formReview' => $formReview->createView()));
    }
}