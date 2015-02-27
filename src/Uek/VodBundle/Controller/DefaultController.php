<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use Uek\VodBundlekBundle\Controller\Controller\DatabaseQueryController;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f FROM UekVodBundle:Films f
            WHERE f.available=1
            ORDER BY f.name');
         $available = $query->getResult();
         
         $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT f.id,f.name,COUNT(o.id) AS num FROM UekVodBundle:Films f JOIN f.orders o GROUP BY f.id ORDER BY num DESC');
         $popular = $query->getResult();
         
         $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT f.id,f.name,COUNT(r.id) AS num FROM UekVodBundle:Films f JOIN f.reviews r GROUP BY f.id ORDER BY num DESC');
         
         $review = $query->getResult();
         
         $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT g FROM UekVodBundle:Genres g');
         
         $genre = $query->getResult();      
         
    
         return $this->render('UekVodBundle:Default:index.html.twig',
             array('available' => $available, 'popular' => $popular, 'review' => $review, 'genre' => $genre));
    }
    
    public function genresAction($genre)
    {
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f, g FROM UekVodBundle:Films f
            JOIN f.genres g 
            WHERE g.name= :name
            ORDER BY f.name');
         $query->setParameter('name', $genre);
         $genre = $query->getResult(); 
         
        return $this->render('UekVodBundle:Default:genre.html.twig', array('genre' => $genre));
    }
    
     public function namesAction($id)
    {
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f FROM UekVodBundle:Films f
            WHERE f.id= :id
            ORDER BY f.name');
         $query->setParameter('id', $id);
         $name = $query->getResult(); 
         
        return $this->render('UekVodBundle:Default:name.html.twig', array('name' => $name));
    }
}
