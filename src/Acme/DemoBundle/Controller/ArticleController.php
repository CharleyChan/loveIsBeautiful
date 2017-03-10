<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/6/28
 * Time: 下午12:01
 */
namespace Acme\DemoBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function recentArticlesAction($max = 3)
    {
        // make a database call or other logic
        // to get the "$max" most recent articles
        $articles = 'NBA Lakers';

        return $this->render(
            'AcmeDemoBundle:Article:recent_list.html.twig',
            array('articles' => $articles, 'max' => $max)
        );
       
    }
}
