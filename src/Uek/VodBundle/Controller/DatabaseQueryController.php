<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity\Films;
use Uek\VodBundle\Entity\Orders;
use Uek\VodBundle\Entity\Genres;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

/**
 * DatabaseQueryController
 * zawiera dwie funckje. Odpowiada za pokazywanie
 * zamówień oraz dostępnych filmów
 * @author Sebastian Szymczyna
 */
class DatabaseQueryController extends Controller{
    
    /**
     * funkcja wyświetla dostępne zamówienia dla zalogowanego użytkownika.
     * Bez zalogowania nie jest możliwy dostęp do strony. Zapytanie wyszukuje
     * dosptępne zamówienia z bazy danych i przekazuje je do strony show.html.twig.
     * @return type render(
            'UekVodBundle:Default:show.html.twig',
            array('orders' => $orders). orders - wyszukane rekordy zamówień
     * dla zalogowanego użytkownika. Jeżeli nie ma zamówień to nic nie wyświetla.
     * @throws AccessDeniedException
     */
    public function showAction(){
        
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }
    
        //logUsrName - nazwa zalogowanego użytkownika
        $logUsrName = $this->get('security.context')->getToken()->getUser()->getUsername();
        //zapytanie do bazy danych
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT u, o, f, os FROM UekVodBundle:Orders o
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