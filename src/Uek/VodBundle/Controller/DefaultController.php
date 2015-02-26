<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use Uek\VodBundlekBundle\Controller\Controller\DatabaseQueryController;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f, g FROM UekVodBundle:Films f
            JOIN f.genres g
            WHERE f.available=1');
         $available = $query->getResult();
         
         $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT f.name,COUNT(o.id) AS num FROM UekVodBundle:Films f JOIN f.orders o GROUP BY f.id');
         $popular = $query->getResult();
         
         $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT f.name,COUNT(r.id) AS num FROM UekVodBundle:Films f JOIN f.reviews r GROUP BY f.id');
         
         $review = $query->getResult();
         
         $query = $this->getDoctrine()->getManager()->createQuery('
             SELECT g FROM UekVodBundle:Genres g');
         
         $genre = $query->getResult();        
         
        return $this->render('UekVodBundle:Default:index.html.twig',
             array('available' => $available, 'popular' => $popular, 'review' => $review, 'genre' => $genre));
    }
}
