<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\Tank;
use Acme\DemoBundle\Entity\Tag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\DemoBundle\Form\Type\TankType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TankController extends Controller
{
    public function newAction(Request $request)
    {
        $tank = new Tank();

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        $tag1 = new Tag();
        $tag1->setName('tag1');
        $tank->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->setName('tag2');
        $tank->getTags()->add($tag2);



        $form = $this->createForm(TankType::class, $tank);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('AcmeDemoBundle:Tank:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
