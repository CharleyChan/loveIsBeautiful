<?php

namespace Acme\DemoBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HelloController extends Controller
{
    /**
     * @Route("/hi/{name1}/{name2}", name="hi")
     */
    public function indexAction($name2,$foo='1234',$page,$title, Request $request)
    {


//        $page2 = $request->query->get('page', 342);

//        echo $page2;

        return new Response('<html><body>Hello '.$name2.$foo.$page.$title.' Welcome !</body></html>');


//        When extending the base controller class, you can access any Symfony service
//        via the get() method. Here are several common services you might need:
//
//        $templating = $this->get('templating');
//        $router = $this->get('router');
//        $mailer = $this->get('mailer');





    }

    /**
     * 发送email
     */
    public function sendEmailAction()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('leo@wizmacau.com')
            ->setTo('charley@wizmacau.com')
            ->setBody(
              $this->renderView(
                '@AcmeDemo/Emails/registration.html.twig',
                  array('name'=>'charley')
              ),
              'text/html'
            );
        $this->get('mailer')->send($message);
        return new Response('send Email ...');
    }
}
