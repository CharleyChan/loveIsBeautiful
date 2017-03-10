<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/6/16
 * Time: 上午11:08
 */
namespace Acme\DemoBundle\Entity;

class Task
{

    protected $task;
    protected $dueDate;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}