<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        // return $this->render('default/index.html.twig', [
        //     'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        // ]);

        // return $this->render('AppBundle:default:index.html.twig');
//        return new Response('Welcome to Symfony !');


        // what's the preferred language of the user?
//        $language = $request->getPreferredLanguage(array('en', 'fr'));
//        echo $language;
//        $session = $request->getSession();
//        echo $session;

        // store an attribute for reuse during a later user request
//        $session->set('foo', 'bar');

        // get the value of a session attribute
//        $foo = $session->get('foo');
//        echo $foo;
        // use a default value if the attribute doesn't exist
        //$foo = $session->get('foo', 'default_value');

        //store a message for the very next request
//        $this->addFlash('notice', 'Congratulations, your action succeeded!');



        $request = Request::createFromGlobals();
        $path = $request->getPathInfo(); // the URI path being requested

        if (in_array($path, array('', '/'))) {
            $response = new Response('Welcome to the homepage.');
        } elseif ('/contact' === $path) {
            $response = new Response('Contact us');
        } else {
            $response = new Response('Page not found.', Response::HTTP_NOT_FOUND);
        }
        $response->send();


    }


    /**
     * @Route("/hello/{name}", name="hello")
     */
    public function helloAction($name)
    {
        return $this->render('default/hello.html.twig', array(
            'name' => $name,
        ));
//        throw $this->createNotFoundException();
    }
}
