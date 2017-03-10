<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/6/28
 * Time: 下午7:22
 */
namespace Acme\DemoBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthorController extends Controller
{
    public function authorAction()
    {
        $author = new Author();

//        $author->name = 'ch';
//        $author->firstName = 'ch';
        $author->password = '123456';
        $author->email = 'qq.com';
        $author->city = 'd';
//        dump($author->isPasswordLegal());



        $validator = $this->get('validator');
        $errors = $validator->validate($author, null, array('registration'));

        if(count($errors) > 0){
//            $errorsString = (string) $errors;
//            return new Response($errorsString);
            return $this->render(
                'AcmeDemoBundle:Author:validation.html.twig',
                array('errors' => $errors)
            );
        }

        return new Response('The author is valid Yes !');
    }
}