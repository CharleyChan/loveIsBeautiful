<?php

namespace Acme\DemoBundle\Controller;

use Doctrine\DBAL\Types\Type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\Date;

class RandomController extends Controller
{

    public function indexAction($limit, $foo = "hello world", Request $request){

        //①返回html格式的响应
//        return new Response(
//            '<html><body>Your Number: '.rand(1, $limit).'</body></html>'
//        );


//        ②返回twig格式的响应
        $number = rand(1, $limit);
        return $this->render(
            'AcmeDemoBundle:Random:index.html.twig',
            array('number' => $number, 'name' => 'charley')
        );


        //③返回json格式的数据响应
//        $title = $request->attributes->get('title');
//        $data = array(
//            'lucky_number' => rand(1,$limit),
//            'foo' => $foo,
//            'title' => $title,
//        );
//        //1...
//        return new Response(
//            json_encode($data),
//            200,
//            array('Content-Type' => 'application/json')
//        );

        //2...
//        return new JsonResponse($data);


        ////④另外一种返回形式
//        $numbers = array(1,2,3,4,5,6,'charley',8);
//        $numberList = implode(',', $numbers);
//        $html = $this->container->get('templating')->render(
//            'AcmeDemoBundle:Random:index.html.twig',
//            array('luckyNumberList' => $numberList)
//        );
//        return new Response($html);

        //⑤重定向返回方式
//        return $this->redirectToRoute('homepage'); by default 302 redirect
//        return $this->redirectToRoute('homepage', array(), 301);
//        return $this->redirect('http://symfony.com/doc');
//        return new RedirectResponse($this->generateUrl('homepage'));

        //⑥Test extending base Controller services  like get() method
//        $templating = $this->get('templating');
//        $router = $this->get('router');
//        $mailer = $this->get('mailer');
//        dump($mailer);
//        return new Response(
//            'Testing ...'
//        );


        //⑦Error page
//        $product = null;
//        if (!$product) {
//            throw $this->createNotFoundException('The product does not exist');
//        }
//        throw new \Exception('Something went wrong!');

        //⑧
//        $page = $request->query->get('page', 5);
//        dump($page);
//
//        $session = $request->getSession();
//        $session->set('foo', 'bar');
//        dump($session);
//
//        $foobar = $session->get('foobar');
//        dump($foobar);
//
//        $filters = $session->get('filters', array());
//        dump($filters);
//
//        $this->addFlash(
//            'notice',
//            'Your changes were saved!');
//        return $this->redirectToRoute('homepage');
//
//
//        return $this->render(
//            'AcmeDemoBundle:Random:index.html.twig'
//        );

//        return new Response(
//            'Testing ...'
//        );


        //⑨Request and Response Class
        // create a simple Response with a 200 status code (the default)
//        $response = new Response('Hello Charley', Response::HTTP_OK);
//        return $response;

        // create a CSS-response with a 200 status code
//        $response = new Response('<style> ... </style>');
//        $response->headers->set('Content-Type', 'text/css');
//        return $response;

//        return $this->json(array('username' => 'jane.doe'));

//        $serializer = $this->get('serializer');
//        dump($serializer);
//        return new Response(
//            'Testing ...'
//        );

        //⑩Forwarding to another Controller
//        $response = $this->forward('AcmeDemoBundle:Task:new', array(
//            'name'  => 'charley',
//            'color' => 'green',
//        ));
//        // ... further modify the response or return it directly
//        return $response;


        //一:Request
//        $request2 = Request::createFromGlobals();

//        dump($_POST) ;
//        dump($_GET);
//        dump($_COOKIE);
//        dump($_FILES);
//        dump($_SERVER);
//        $request2->get('request');
//        dump($request2);
//        $request2->get('query');
//        dump($request2);
//        $request2->get('cookies');
//        dump($request2);
//        $request2->get('files');
//        dump($request2);
//        $request2->get('server');
//        dump($request2);
//        $request2->get('headers');
//        dump($request2);
//        $request2->get('attributes');
//        dump($request2);

        // the query string is '?foo=bar'

//        $request2->query->get('foo');
//// returns 'bar'
//        dump($request2);
//
//        $request2->query->get('bar');
//// returns null
//        dump($request2);
//        $request2->query->get('bar', 'baz');
//// returns 'baz'
//        dump($request2);
//        $request2->getPathInfo();
//        dump($request2);

//        $accept = AcceptHeader::fromString($request2->headers->get('Accept'));
//        if ($accept->has('text/html')) {
//            $item = $accept->get('text/html');
//            $charset = $item->getAttribute('charset', 'utf-8');
//            $quality = $item->getQuality();
//        }
//// Accept header items are sorted by descending quality
//        $accepts = AcceptHeader::fromString($request->headers->get('Accept'))
//            ->all();
//        dump($accept);
//        dump($accepts);
//
//        return new Response(
//            'Testing ...'
//        );






        //二:Response
//        $response = new Response(
//            'Content',
//            Response::HTTP_OK,
//            array('content-type' => 'text/html')
//        );
//
//        $response->setContent('Hello World');
//        $response->headers->set('Content-Type', 'text/plain');
//        $response->setCharset('utf-8');
////        $response->setStatusCode(Response::HTTP_NOT_FOUND);
//
////        dump($response);
////        return $response;
//        //在 send response前,确保兼容性compliant
//        $response->headers->setCookie(new Cookie('foo', 'bar'));
//        $response->headers->clearCookie('foo');
//
//        dump($response);
//        return $response;
//        $response->prepare($request);
//        $response->send();


//        $response = new StreamedResponse();
//        $response->setCallback(function () {
//            var_dump('Hello World');
//            flush();
//            sleep(2);
//            var_dump('Hello World');
//            flush();
//        });
//        $response->send();

//        $response = new Response(
//            'Content',
//            Response::HTTP_OK,
//            array('content-type' => 'text/html')
//        );
//        $d = $response->headers->makeDisposition(
//            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
//            'foo.pdf'
//        );
//
//        $response->headers->set('Content-Disposition', $d);
//        $response->send();

//        $response = new Response();
//        $response->setContent(json_encode(array(
//            'data' => 123,
//            'name' => 'chenchao',
//        )));
//        $response->headers->set('Content-Type', 'application/json');
//        $response = new JsonResponse();
//        $response->setData(array(
//            'date' => 123,
//        ));
//        $response->send();





        //三 Session

//        $session = new Session();
////        $session->start();
//
//        // set and get session attributes
//        $session->set('name', 'Drak');
//        $session->get('name');
//
//        // set flash messages
//        $session->getFlashBag()->add('notice', 'Profile updated');
//
//        // retrieve messages
//        foreach ($session->getFlashBag()->get('notice', array()) as $message) {
//            echo '<div class="flash-notice">'.$message.'</div>';
//        }
//        return new Response('Hello');


    }

    public function pageshowAction($page)
    {
        echo "PageShow Method Testing ...";
        return new Response($page);
    }

    public function showAction()
    {
//        $lang = 'gb';
//        $nxm = 1;
//        $url = "http://whatson.macautourism.gov.mo/rss/rss_for_apps.php?lang=".$lang."&key=skqlay2mrtez9qeem2aorrkxd&nxm=".$nxm;
//        $url_content = file_get_contents($url);
//        $xmlData = simplexml_load_file($url_content);
//        $xmlDataArr = (array)$xmlData;
//        foreach((array)$xmlDataArr['records'] as $val)
//        {
//            dump((array)$val);
//        }
//        dump((array)$xmlDataArr['monthly']->title);
//        foreach($xmlData->records->record as $val)
//        {
//            dump($val);
//        }
//        return new Response("Parse xml data testing ...");
//        $originalDate = "1000-01-01";
//        $newDate = date("d-m-Y", strtotime($originalDate));
//        echo $newDate."<br/>";
//
//        $source = '2012-07-31';
//        $date = new \DateTime($source);
//        echo $date->format('d.m.Y')."<br/>";
//        echo $date->format('d-m-Y');
//
//        $oldDate = '2010-03-20';
//        $arr = explode('-', $oldDate);
//        var_dump($arr);
//        echo $arr[2]."-".$arr[1].'-'.$arr[0];
//        echo "<br/>";
//
//        $timezone = date_default_timezone_get();
//        echo $timezone;
////        date_default_timezone_set('Asia/Macao');
//        $date = date('Y-m-d h:i:s');
//        var_dump($date);
//        echo "<br/>";
//
//        $now = new \DateTime();
//        var_dump($now->format('Y-m-d H:i:s'));
//        echo "<br/>";
//        echo $now->getTimestamp();

//        $baseUrl = 'http://whatson.macautourism.gov.mo/';
//        $imagePath = 'upload/2016_08/14694996200.jpg';
//        $remoteUrl =$baseUrl.$imagePath;
//
//        $fileContent = file_get_contents($remoteUrl); //二进制文件
//        $pathInfo = pathinfo($remoteUrl);
//
//        dump($pathInfo);
//        $newFileName = sprintf('%s.%s',
//            uniqid(mt_rand(10000,99999)),
//            strtolower(strtolower($pathInfo['extension'])) //$pathInfo['extension']='jpg';
//        );
//        $relativePath = '/uploads/attachments/'.date('Y-m');
//        $uploadDir = $this->getParameter('kernel.root_dir').'/../web'.$relativePath;
//
//        if(!file_exists($uploadDir)){
//            mkdir($uploadDir,0755,true);
//        }
//        $file = $relativePath.'/'.$newFileName;
//
//        file_put_contents($uploadDir.'/'.$newFileName, $fileContent);
//
//        $arr = array(
//            'fileName' => $newFileName,
//            'uploadDir' => $uploadDir,
//            'file' => $file,
//            'filePath' => $uploadDir.'/'.$newFileName,
//        );
//        dump($arr);
        $content = file_get_contents("http://cms.gcs.gov.mo/api/BookXml.json");
        $content = json_decode($content);
        $i = 0;
        foreach ( $content->books as $value) {
            echo $value->id.'=='.$value->root_id.'=='.$value->term.'<br/>';
            $i++;
        }
        echo $i;

        return new Response("<br/>testing ...");
    }





}
