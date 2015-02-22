<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UekVodBundle:Default:index.html.twig');
    }
}
