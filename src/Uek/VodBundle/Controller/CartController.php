<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller{
    public function delAction($title){
        $session = $this->getRequest()->getSession();
        $number =$session->get('orderNumber');
        $numberFilm =$session->get('numberFilm');
        for($i=0; i < $number; $i++){
            
            if (strcmp($numberFilm[$i],$title)){
                $title = 0;        
            }
        }
        if($title != 0){
            $number += 1;
            $numberFilm[$number]=$title;

  //      $numberFilm[2]=$title;
        $session->set('orderNumber', $number);
        $session->set('numberFilm', $numberFilm);
        
        }
 //       $number =$session->get('orderNumber');
//       echo $number;
 //      $zmienna = '111';
//            return $this->redirect($this->generateUrl('task_success',array()));z
        return $this->render('UekVodBundle::test.html.twig', array());
  //       return $this->render('UekVodBundle:Default:success.html.twig', array());
    }
    
     public function getAction(Request $request){
         
        $session = $this->getRequest()->getSession();
        
        $num =$session->get('orderNumber');
        echo $num;

 //           return $this->redirect($this->generateUrl('task_success',array('id'=>$id)));

        
         return $this->render('UekVodBundle::test.html.twig', array());
    }
    
         public function showAction(Request $request){
         
     
          $session = $this->getRequest()->getSession();
        
        $name =$session->get('numberFilm');
        $orderNumber =$session->get('orderNumber');
     //  echo $name;
        return $this->render('UekVodBundle:Default:cart.html.twig', array('name' => $name, 'orderNumber' => $orderNumber));
    }
}