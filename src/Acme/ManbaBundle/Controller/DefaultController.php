<?php

namespace Acme\ManbaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{
    public function indexAction()
    {
        $response = $this->render('AcmeManbaBundle:Default:index.html.twig');

        //cache for 3600 seconds
        $response->setSharedMaxAge(3600);

        //(optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);

        return $response;

//        return $this->render('AcmeManbaBundle:Default:index.html.twig');

    }
}
