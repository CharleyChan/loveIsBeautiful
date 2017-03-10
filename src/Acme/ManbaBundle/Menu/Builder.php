<?php

/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/10/11
 * Time: 下午12:58
 */
namespace Acme\ManbaBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route'=>'homepage'))
            ->setExtra('translation_domain', 'AcmeManbaBundle');
        
        $menu->addChild('About me',array('route'=>'homepage'))
            ->setExtra('translation_domain', 'AcmeManbaBundle');
        
        $menu['About me']->addChild('Edit profile', array('route'=>'homepage'))
            ->setExtra('translation_domain', 'AcmeManbaBundle');
        
        return $menu;

    }
}