<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity\Task;
use Uek\VodBundle\Entity\Reviews;
use Uek\VodBundle\Entity\Films;
use Uek\VodBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller{
    public function addAction(Request $request, $id)
            {
        // create a task and give it some dummy data for this example
        $task = new Task();
#        $task->setTask('Tutaj możesz napisać recenzje wybranego filmu');
#        $task->setDueDate(new \DateTime('tomorrow'));

        $formReview = $this->createFormBuilder($task)
            ->add('task', 'textarea')
 #           ->add('dueDate', 'date')
            ->add('Zapisz recenzje', 'submit')
                
            ->getForm();
        $formReview->handleRequest($request);
        
            if ($formReview->isValid()) {
                $logUsrName = $this->get('security.context')->getToken()->getUser()->getId();
                $date = date('Y-m-d H:i:s', time());
                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository('UekVodBundle:Users')->find($logUsrName);
                $film = $em->getRepository('UekVodBundle:Films')->find($id);
 
                $review = new Reviews();
                $review->setCreateDate($date);
                $review->setFilms($film);
                $review->setUsers($user);
                $review->setDescription($task->getTask());
                $em->persist($review);
                $em->flush();

            return $this->redirect($this->generateUrl('task_success',array('id'=>$id)));
    }
        
        return $this->render('UekVodBundle:Review:add.html.twig', array(
            'formReview' => $formReview->createView(),
        ));
    }
}