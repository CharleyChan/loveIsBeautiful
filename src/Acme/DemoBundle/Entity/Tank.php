<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/7/5
 * Time: 下午5:27
 */
namespace Acme\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Tank
{
    protected $description;

    protected $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTags()
    {
        return $this->tags;
    }
}