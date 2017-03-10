<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\Product;
use Acme\DemoBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProductController extends Controller{

    public function createAction()
    {
        $product = new Product();
        $product->setName('Bike');
        $product->setPrice(30.22);
        $product->setDescription('It is good !');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

    public function showAction()
    {
        //1....
//        $product = $this->getDoctrine()
//            ->getRepository('AcmeDemoBundle:Product')
//            ->find(13);
//        $categoryName = $product->getCategory()->getName();
//         dump($categoryName);
//         dump($product);

// prints "Proxies\AppBundleEntityCategoryProxy"
//        $category = $product->getCategory();
//        dump(get_class($category));
//        die();


        //2...
//        $category = $this->getDoctrine()
//            ->getRepository('AcmeDemoBundle:Category')
//            ->find(3);
//        $products = $category->getProducts();
//        dump($category);



        //3...
        $product = $this->getDoctrine()
            ->getRepository('AcmeDemoBundle:Product')
            ->findByIdJoinedToCategory();

        $category = $product->getCategory();
        dump($product);
        dump($category);


//        $product = $this->getDoctrine()
//            ->getRepository('AcmeDemoBundle:Product');
//        $row = $product->findAllOrderByName();
//        dump($row);



        //返回对象
//        $row = $product->findOneById(9);
//        $row = $product->findOneByName('charley');
//        $row = $product->findOneByPrice(19.99);

        //返回数组 各个维度里面也是对象
//        $row = $product->findById(7);
//        $row = $product->findByName('Charley');
//        $row = $product->findByDescription('Hello World!');

//        $row = $product->findAll();

//        $row = $product->findOneBy(
//            array('name' => 'Charley', 'price' => 24.88)
//        );

//        $row = $product->findBy(
//            array('name' => 'Charley'),
//            array('id' => 'ASC')
//        );
//
//
//        if(!$product){
//            throw $this->createNotFoundException(
//                'No product found for id '
//            );
//        }
//
//        var_dump($row);
//
//
//        return new Response('database information showing...');



        //Querying for Objects with DQL
//        $em = $this->getDoctrine()->getManager();
//        $query = $em->createQuery(
//            'SELECT p
//    FROM AcmeDemoBundle:Product p
//    WHERE p.price >= :price
//    ORDER BY p.price ASC'
//        )->setParameter('price', 19.99);
//
////        $products = $query->setMaxResults(1)->getOneOrNullResult();
//        $products = $query->getResult();
//        dump($products);



        
//        $respository = $this->getDoctrine()
//            ->getRepository('AcmeDemoBundle:Product');
//
//        $query = $respository->createQueryBuilder('p')
//            ->where('p.price >= :price')
//            ->setParameter('price', '19.99')
//            ->orderBy('p.price', 'ASC')
//            ->getQuery();
//        $products = $query->getResult();
//        dump($products);

        return new Response('<br/>database information showing...');
    }

    public function updateAction()
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AcmeDemoBundle:Product');

        $row = $product->findOneById(12);

        if(!$product){
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $row->setName('BigBangww');
        $row->setPrice(52.33);
        $row->setDescription('Wonderful Baby !');
        $em->flush();

        return new Response('Update database ...');



    }

    public function deleteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AcmeDemoBundle:Product');
        $product = $product->find(12);
        $em->remove($product);
        //一定要和remove函数连用,否则删除不成功!
        $em->flush();
        return new Response('delete database ...');

    }

    public function createProductAction()
    {
        $category = new Category();
        $category->setName('Computer Peripherals 11');

        $product = new Product();
        $product->setName('Keyboard3');
        $product->setPrice(13.33);
        $product->setDescription('Ergonomic asd stylish  11');
       
        //relate this product to the category
        $product->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();

        return new Response(
            'Saved new product with id: '.$product->getId().
            'And new category with id: '.$category->getId()
        );

    }


}


