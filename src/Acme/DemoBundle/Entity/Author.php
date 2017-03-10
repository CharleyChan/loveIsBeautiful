<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/6/28
 * Time: 下午7:17
 */
namespace Acme\DemoBundle\Entity;


class Author
{
    public $name;

    public $firstName;

    public $password;

    public $email;

    public $city;
    
    public $gender;

    public function isPasswordLegal()
    {
        //... return true or false
        return $this->firstName !== $this->password;
    }
}