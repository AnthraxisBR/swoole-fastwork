<?php


namespace AnthraxisBR\SwooleFW\tasks;


use AnthraxisBR\SwooleFW\Application;
use AnthraxisBR\SwooleFW\database\Connect;

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