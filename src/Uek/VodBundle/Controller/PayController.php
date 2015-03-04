<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
/**
 * Description of SecurityController
 *
 * @author Sebastian Szymczyna
 */
class PayController extends Controller{
    
    public function payAction()
    {
        
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
        throw new AccessDeniedException();
    }
    
    $session = $this->getRequest()->getSession();
    $price=$session->get('price');
    $mail=$this->get('security.context')->getToken()->getUser()->getEmail();
    
   // $em = $this->getDoctrine()->getManager();
   //             $user = $em->getRepository('UekVodBundle:Users')->findByUsername($logUsrName);
    //            $film = $em->getRepository('UekVodBundle:Films')->find($id);
                
                
		$data = [
			'id' =>'72890',
			'kwota' => $price,
			'waluta' => 'PLN',
			'opis' => 'Zapłata za wypożyczenia',
			'URLC' => 'http://v-ie.uek.krakow.pl',
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
