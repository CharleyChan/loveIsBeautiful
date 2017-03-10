<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/6/23
 * Time: 下午12:46
 */
namespace Acme\DemoBundle\Menu;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Acme\DemoBundle\Entity\Product;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'));


//        // access services from the container!
//        $em = $this->container->get('doctrine')->getManager();
//        // findMostRecent and Product are just imaginary examples
//        $product = $em->getRepository('AcmeDemoBundle:Product')->find(11);
//
//        $menu->addChild('Latest Product Post', array(
//            'route' => 'product_show',
//            'routeParameters' => array('id' => 11)
//        ));
//
//        // create another menu item
        $menu->addChild('About Me', array('route' => 'homepage'));
//        // you can also add sub level's to your menu's as follows
        $menu['About Me']->addChild('Edit profile', array('route' => 'homepage'));
//
//        // ... add more children

        return $menu;
    }
}