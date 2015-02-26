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
         
        return $this->render('UekVodBundle:Default:index.html.twig',
            array('available' => $available));
    }
}
