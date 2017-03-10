<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/10/11
 * Time: 下午3:40
 */

namespace Acme\ManbaBundle\Menu;
use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->addChild('Home',array('route'=>'homepage'))
            ->setExtra('translation_domain','AcmeManbaBundle');

        $menu->addChild('About me', array('route'=>'homepage'));
        $menu['About me']->addChild('Edit profile', array('route'=>'homepage'))
            ->setExtra('translation_domain','AcmeManbaBundle');
        $menu['About me']->addChild('Show picture', array('route'=>'homepage'))
            ->setExtra('translation_domain','AcmeManbaBundle');

        return $menu;
    }

    public function createSidebarMenu(array $options)
    {
        $menu = $this->factory->createItem('sidebar');

        if(isset($options['include_homepage']) && $options['include_homepage']){
            $menu->addChild('Home', array('route'=> 'homepage'));
//                ->setExtra('translation_domain', 'AcmeManbaBundle');
        }
        //...add more children
        return $menu;
    }

}