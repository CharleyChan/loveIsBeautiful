<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\DemoBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    public function newAction(Request $request)
    {

        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // ... perform some action, such as saving the task to the database

            if($form->get('saveAndAdd')->isClicked()){
                return new Response("save and add submit successfully!");

            }elseif($form->get('save')->isClicked()){
                return new Response("save submit successfully!");
            }
        }
        return $this->render('AcmeDemoBundle:Task:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
