<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity\Films;
use Uek\VodBundle\Entity\Users;
use Uek\VodBundle\Entity\Orders;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

class ShowOrdersController extends Controller
{
    public function indexAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
        throw new AccessDeniedException();
    }
    
    $logUsrName = $this->get('security.context')->getToken()->getUser()->getUsername();
$query = $this->getDoctrine()->getManager()->createQuery('
            SELECT u, p, c FROM UekVodBundle:Orders p
            JOIN p.films c
            JOIN p.users u
            WHERE u.name = :name'
        )->setParameter('name', $logUsrName);
 
    $orders = $query->getResult();

 #   $category = $product->getCategory();
    
    echo $this->get('security.context')->getToken()->getUser()->getUsername();
    if (!$orders) {
        throw $this->createNotFoundException(
            'No product found for id '
        );
    }
    return $this->render(
            'UekVodBundle:Default:show.html.twig',
            array('orders' => $orders)
        );
    }
}