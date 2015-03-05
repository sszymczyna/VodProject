<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
/**
 * Klasa obslugujaca system platnosci
 *
 * @author Sebastian Szymczyna
 */
class PayController extends Controller{
    /**
     * funkcja wymaga zalogowania. Pobiera dane z sesji oraz wysyla jest na strone
     * platnosci gdzie taka sie dokonuje
     * @return RedirectResponse
     * @throws AccessDeniedException
     */
    public function payAction()
    {
        
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
        throw new AccessDeniedException();
    }
    
    $session = $this->getRequest()->getSession();
    $price=$session->get('price');
    $mail=$this->get('security.context')->getToken()->getUser()->getEmail();
                
                
		$data = [
			'id' =>'72890',
			'kwota' => $price,
			'waluta' => 'PLN',
			'opis' => 'Zapłata za wypożyczenia',
			'URLC' => 'http://v-ie.uek.krakow.pl/~s178428/app.dev',
			'email' => $mail
		];
		$params = http_build_query($data);
		$url = sprintf(
			'%s?%s',
			'https://ssl.dotpay.pl',
			$params
		);
		
		return new RedirectResponse($url);
    }
}
