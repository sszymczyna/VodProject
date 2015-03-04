<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
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
/*		$data = [
			'id' =>'',
			'kwota' => 160.49,
			'waluta' => 'PLN',
			'opis' => 'Zapłata za wypożyczenia',
			'control' => 'DOK000045/01/2015',
			'URLC' => 'http://myDomain.dev/app_dev.php/payment/handle',
			'firstname' => 'myName',
			'lastname' => 'mySurname',
			'email' => 'jakub@jkan.pl'
		];
		$params = http_build_query($data);
		$url = sprintf(
			'%s?%s',
			'https://ssl.dotpay.pl',
			$params
		);
*/		
//		return new RedirectResponse($url);
       return $this->render(
            'UekVodBundle:Default:index.html.twig',
            array()
        );
    }
}
