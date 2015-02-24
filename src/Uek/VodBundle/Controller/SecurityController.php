<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
/**
 * Description of SecurityController
 *
 * @author Sebastian Szymczyna
 */
class SecurityController extends Controller{
    
    public function loginAction(){
        $request = $this->getRequest();
        $session = $request->getSession();
        
        //get the login error if there is
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        
        return $this->render(
            'UekVodBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
        
    }
    
    public function logoutAction(){
        $this->getUser()->setAuthenticated(false);

        $this->getUser()->shutdown();

        $this->redirect(`@homepage`);
    }
}
