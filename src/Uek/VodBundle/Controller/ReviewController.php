<?php

namespace Uek\VodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\VodBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller{
    public function addAction(Request $request)
            {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Tutaj możesz napisać recenzje wybranego filmu');
#        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'textarea')
 #           ->add('dueDate', 'date')
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($request);
        
            if ($form->isValid()) {
        // perform some action, such as saving the task to the database

            return $this->redirect($this->generateUrl('task_success'));
    }
        
        return $this->render('UekVodBundle:Review:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}