<?php

namespace Uek\VodBundle\Controller;

use Uek\VodBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * klasa odpowiada przede wszystkim za pasek informacyjny po lewej stronie. 
 * Zawiera również funkcje, która przekierowuje do wybranego filmu lub gatunku
 * filmowego
 * 
 * @author Sebastian Szymczyna
 */
class DefaultController extends Controller{

    /**
     * Generuje stronę startową z listą dostępnych filmów
     * 
     * @return type 'UekVodBundle:Default:index.html.twig'
     */
    public function indexAction(){
        
        return $this->render('UekVodBundle:Default:index.html.twig',
             array());
    }
    
    /**
     * zapytaniem generujemy najbardziej popularne filmy i zwracamy to w tablicy
     * 
     * @return type 'UekVodBundle:Information:popular.html.twig',
             array('popular' => $popular) najbardziej popularne filmy
     */
    public function popularAction(){
        
        $query = $this->getDoctrine()->getManager()->createQuery('
            
            SELECT f.id,f.name,
            COUNT(o.id) AS num 
            FROM UekVodBundle:Films f 
            JOIN f.orders o 
            GROUP BY f.id 
            ORDER BY num DESC');
        $popular = $query->getResult();
        
        return $this->render('UekVodBundle:Information:popular.html.twig',
             array('popular' => $popular));
    }  
    /**
     * zapytanie, ktore generuje wszystkie dostepne filmy 
     * @return type 'UekVodBundle:Information:available.html.twig',
             array('available' => $available) tablica z lista dostepnych filmow
     */
    public function availableFilmsAction(){
        
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f FROM UekVodBundle:Films f
            WHERE f.available=1
            ORDER BY f.name');
         $available = $query->getResult();
         
  return $this->render('UekVodBundle:Information:available.html.twig',
             array('available' => $available));
 }   

    /**
     * zapytaniem generujemy filmy, ktore maja najwiecej rezencji i zwracamy to w tablicy
     * 
     * @return type  'UekVodBundle:Information:review.html.twig',
             array('review' => $review) tablica, ktora zawiera filmy najczesciej
     * recenzowane
     */
      
    public function reviewAction(){
        
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

    /**
     * zapytanie, ktore generuje dostepne gatunki filmowe
     * 
     * @return type 'UekVodBundle:Information:genre.html.twig',
             array('genre' => $genre) tablica, ktora zwraca nazwy gatunkow filmowych
     */
    public function genreAction(){
        
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT g FROM UekVodBundle:Genres g');
         
        $genre = $query->getResult();      
         
        return $this->render('UekVodBundle:Information:genre.html.twig',
             array('genre' => $genre));
    }
 
    /**
     * wyszukiwanie listy filmow segregowanej wedlug gatunku
     * @param type $genre gatunek ktory zostal wybrany 
     * @return type 'UekVodBundle:Default:genre.html.twig', array('qGenre' => $qGenre, 'genre' => $genre)
     * tablica filmow qGenre oraz nazwa wybranego gatunku genre
     */
    public function genresAction($genre){
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT f, g FROM UekVodBundle:Films f
            JOIN f.genres g 
            WHERE g.name= :name
            ORDER BY f.name');
         $query->setParameter('name', $genre);
         $qGenre = $query->getResult(); 
         
        return $this->render('UekVodBundle:Default:genre.html.twig', array('qGenre' => $qGenre, 'genre' => $genre));
    }
    /**
     * wyszukiwanie odpowiedniego filmu wraz z formularzem go wypozyczenia jego
     * (przycisk "wypozycz")
     * @param Request $request
     * @param type $id id filmu podany jako parametr do wyszukiwania
     * @param type $s zmienna informujaca o tym czy recenzja zostala poprawnie dodana
     * @return type array('name' => $name, 'review' => $review, 'formRent' => $formRent->createView(), 's' => $s)
     * name to wyszukany film, review wszystkie recenzje ktore sa przypisane do danego filmu
     */
     public function namesAction(Request $request, $id,$s){
        
         // wyszukiwanie filmu na ktory mamy byc przekierowani
        $name = $this->getDoctrine()->getRepository('UekVodBundle:Films')->find($id);
     
        //wyszukiwanie dostepnych recenzji
        $query = $this->getDoctrine()->getManager()->createQuery('
            SELECT r,f,u FROM UekVodBundle:Reviews r
            JOIN r.films f
            JOIN r.users u
            WHERE f.id= :id
            ORDER BY r.create_date DESC');
        $query->setParameter('id', $id);
        $review = $query->getResult();      
        $orders = 0;
  
        //jezeli uzytkownik jest zalogowany to wyszkaj jego zamowien
        if (true === $this->get('security.context')->isGranted('ROLE_USER')) {
          //logUsrName - nazwa zalogowanego użytkownika
            $logUsrName = $this->get('security.context')->getToken()->getUser()->getUsername();
            //sprawdzamy czy dany zalogowany uzytkownik moze wypozyczyc film czy go ogladnac
            $query = $this->getDoctrine()->getManager()->createQuery('
                 SELECT u, o, f, os FROM UekVodBundle:Orders o
                JOIN o.films f
                JOIN o.users u
                JOIN o.orderStatus os
                WHERE u.username = :username AND f.id = :fid AND os.name = :statusname
                ORDER BY os.name ASC, o.date ASC'
            )->setParameter('username', $logUsrName);
            $query->setParameter('fid', $id);
            $query->setParameter('statusname', 'zapłacone');
            $orders = $query->getResult();
        }
        //formularz sluzacy do wcisniescia przycisku "wypozycz"
        $formRent = $this->createFormBuilder()->getForm();
        $formRent->handleRequest($request);
        
        $session = $this->getRequest()->getSession();
        
        //pobranie 3 zmiennych sesji, ilosc filmow orderNumber, nazwy filmow numberFilm, laczna cena price
        $number =$session->get('orderNumber');
        $numberFilm =$session->get('numberFilm');
        $price = $session->get('price');
        
            if ($formRent->isValid()) {
                
                $su=0;
                //petla ktora porownuje czy film nie zostal juz dodany
                for($i=1; $i <= $number; $i++){
                    if (!strcmp($numberFilm[$i],$name->getName())){
                        $su= 1;
                    }   
                }
        
                if($su == 0){
                    //dodawanie filmu do biezacej sesji
                    $number += 1;
                    $numberFilm[$number]=$name->getName();
                    $price = $price + $name->getPrice() ;

                    $session->set('orderNumber', $number);
                    $session->set('numberFilm', $numberFilm);
                    $session->set('price', $price);
                }
            }
        return $this->render('UekVodBundle:Default:name.html.twig', array('orders' => $orders,'name' => $name, 'review' => $review, 'formRent' => $formRent->createView(), 's' => $s));
    }
}
