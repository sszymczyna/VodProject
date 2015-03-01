<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity;
use Symfony\Component\HttpFoundation\Request;

class BasketController extends Controller{
    public function addAction(){
        $session = $this->getRequest()->getSession();
        $number =$session->get('orderNumber');
        $number += 1;
        $session->set('orderNumber', $number);
 //       $number =$session->get('orderNumber');
//       echo $number;
 //      $zmienna = '111';
//            return $this->redirect($this->generateUrl('task_success',array()));

        
         return $this->render('UekVodBundle:Default:Basket.html.twig', array());
    }
    
     public function getAction(){
        $session = $this->getRequest()->getSession();
        
        $number =$session->get('orderNumber');
       echo $number;
 //           return $this->redirect($this->generateUrl('task_success',array('id'=>$id)));

        
         return $this->render('UekVodBundle:Default:Basket.html.twig', array('number' => $number));
    }
}