<?php


namespace AnthraxisBR\FastWork\tasks;


use AnthraxisBR\FastWork\Application;
use AnthraxisBR\FastWork\database\Connect;

class TasksReceiver extends Application
{
    public function __construct()
    {

        $this->connect = new Connect();
        $this->em = $this->connect->getEntityManager();
    }

    public function entityManager()
    {
        return $this->em;
    }
}