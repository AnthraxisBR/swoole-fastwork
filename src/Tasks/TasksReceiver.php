<?php


namespace AnthraxisBR\FastWork\Tasks;


use AnthraxisBR\FastWork\Application;
use AnthraxisBR\FastWork\Database\Connect;

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