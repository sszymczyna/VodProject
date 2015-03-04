<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity\Films;
//use Uek\VodBundle\Entity\Users;
use Uek\VodBundle\Entity\Orders;
use Uek\VodBundle\Entity\Genres;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

class DatabaseQueryController extends Controller
{
    public function showAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
        throw new AccessDeniedException();
    }
    
    $logUsrName = $this->get('security.context')->getToken()->getUser()->getUsername();
$query = $this->getDoctrine()->getManager()->createQuery('
            SELECT u, o, f FROM UekVodBundle:Orders o
            JOIN o.films f
            JOIN o.users u
            JOIN o.orderStatus os
            WHERE u.username = :username
            ORDER BY os.name ASC, o.date ASC'
        )->setParameter('username', $logUsrName);
 
    $orders = $query->getResult();
    

    if (!$orders) {

            $orders=0;

    }
    return $this->render(
            'UekVodBundle:Default:show.html.twig',
            array('orders' => $orders)
        );
    }
    
public function AvailableFilmsAction(){
    
    $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f, g FROM UekVodBundle:Films p
            JOIN p.genres g');
 
    $orders = $query->getResult();
    
    if (!$orders) {
        throw $this->createNotFoundException(
            'No product found for id '
        );
    }
    return $orders;
    }    

}