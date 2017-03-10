<?php

namespace MyWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{
    /**
     * @Route("/index")
     *
     */
    public function indexAction()
    {
        $doctrine = $this->container->get('doctrine');
//        $doctrine->
        return $this->render('MyWebBundle:Default:index.html.twig', array(
            'user' => '澳門特別行政區立法會',
        ));
    }
}
