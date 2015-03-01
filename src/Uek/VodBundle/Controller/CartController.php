<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller{
    public function addAction(){
        $session = $this->getRequest()->getSession();
        $number =$session->get('orderNumber');
        $number += 1;
        $session->set('orderNumber', $number);
 //       $number =$session->get('orderNumber');
//       echo $number;
 //      $zmienna = '111';
//            return $this->redirect($this->generateUrl('task_success',array()));z
        return $this->render('UekVodBundle::test.html.twig', array());
  //       return $this->render('UekVodBundle:Default:success.html.twig', array());
    }
    
     public function getAction(Request $request){
         
        $session = $this->getRequest()->getSession();
        
        $number =$session->get('orderNumber');
       echo $number;
 //           return $this->redirect($this->generateUrl('task_success',array('id'=>$id)));

        
         return $this->render('UekVodBundle:layout.html.twig', array('number' => $number));
    }
    
         public function showAction(Request $request){
         
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f FROM UekVodBundle:Films f
            WHERE f.id= :id
            ORDER BY f.name');
         $query->setParameter('id', 1);
         $name = $query->getResult(); 
         
          $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT r,f FROM UekVodBundle:Reviews r
            JOIN r.films f
            WHERE f.id= :id
            ORDER BY r.create_date DESC');
         $query->setParameter('id', 1);
         $review = $query->getResult();        
         
        return $this->render('UekVodBundle:Default:cart.html.twig', array('name' => $name, 'review' => $review));
    }
}