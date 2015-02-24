<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity\Films;
use Uek\VodBundle\Entity\Users;
use Uek\VodBundle\Entity\Orders;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ShowOrdersController extends Controller
{
    public function indexAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
        throw new AccessDeniedException();
    }
         $posts = $this->get('doctrine')->getManager()
            ->createQuery('SELECT o FROM UekVodBundle:Orders o WHERE o.vodUserId = 3')
            ->execute();

        return $this->render(
            'UekVodBundle:Default:show.html.twig',
            array('posts' => $posts)
        );
    }
}