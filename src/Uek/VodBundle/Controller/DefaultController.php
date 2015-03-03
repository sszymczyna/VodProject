<?php

namespace Uek\VodBundle\Controller;

use Uek\VodBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use Uek\VodBundlekBundle\Controller\Controller\DatabaseQueryController;

class DefaultController extends Controller
{
    public function indexAction()
    {

         return $this->render('UekVodBundle:Default:index.html.twig',
             array());
    }
    public function popularAction()
    {
        $query = $this->getDoctrine()->getManager()->createQuery('
                        SELECT f.id,f.name,COUNT(o.id) AS num FROM UekVodBundle:Films f JOIN f.orders o GROUP BY f.id ORDER BY num DESC');
         $popular = $query->getResult();
          return $this->render('UekVodBundle:Information:popular.html.twig',
             array('popular' => $popular));
 }  
 
     public function availableFilmsAction()
    {
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f FROM UekVodBundle:Films f
            WHERE f.available=1
            ORDER BY f.name');
         $available = $query->getResult();
         
  return $this->render('UekVodBundle:Information:available.html.twig',
             array('available' => $available));
 }   

      public function reviewAction()
    {
         $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT f.id,f.name,COUNT(r.id) AS num 
             FROM UekVodBundle:Films f 
             JOIN f.reviews r 
             GROUP BY f.id 
             ORDER BY num DESC');
         
         $review = $query->getResult();
         
  return $this->render('UekVodBundle:Information:review.html.twig',
             array('review' => $review));
 } 
 
 public function genreAction(){

     $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT g FROM UekVodBundle:Genres g');
         
         $genre = $query->getResult();      
         
    
         return $this->render('UekVodBundle:Information:genre.html.twig',
             array('genre' => $genre));
 }
 
    public function genresAction($genre)
    {
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f, g FROM UekVodBundle:Films f
            JOIN f.genres g 
            WHERE g.name= :name
            ORDER BY f.name');
         $query->setParameter('name', $genre);
         $qGenre = $query->getResult(); 
         
        return $this->render('UekVodBundle:Default:genre.html.twig', array('qGenre' => $qGenre, 'genre' => $genre));
    }
    
     public function namesAction(Request $request, $id,$s)
    {
        $name = $this->getDoctrine()->getRepository('UekVodBundle:Films')->find($id);
     
          $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT r,f,u FROM UekVodBundle:Reviews r
            JOIN r.films f
            JOIN r.users u
            WHERE f.id= :id
            ORDER BY r.create_date DESC');
         $query->setParameter('id', $id);
         $review = $query->getResult();        
         echo $s;
         
               $em = $this->getDoctrine()->getManager();

                $film = $em->getRepository('UekVodBundle:Films')->find($id);
            
        $formReview = $this->createFormBuilder()->getForm();
        $formReview->handleRequest($request);
        
        if ($formReview->isValid()) {

                    $session = $this->getRequest()->getSession();
        $number =$session->get('orderNumber');
        $numberFilm =$session->get('numberFilm');
        $su=0;
 
        for($i=1; $i <= $number; $i++){
 
            if (!strcmp($numberFilm[$i],$film->getName())){
                $su= 1;        
            }
        }
        if($su == 0){
            $number += 1;
            $numberFilm[$number]=$film->getName();

  //      $numberFilm[2]=$title;
        $session->set('orderNumber', $number);
        $session->set('numberFilm', $numberFilm);}
            
            }
        return $this->render('UekVodBundle:Default:name.html.twig', array('name' => $name, 'review' => $review, 'formReview' => $formReview->createView(), 's' => $s));
    
}
}
