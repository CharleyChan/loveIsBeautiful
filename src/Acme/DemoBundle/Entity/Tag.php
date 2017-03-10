<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/7/5
 * Time: 下午5:31
 */

// src/AppBundle/Entity/Tag.php
namespace Acme\DemoBundle\Entity;

class Tag
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}