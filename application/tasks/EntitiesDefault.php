<?php


namespace App\tasks;


use AnthraxisBR\FastWork\database\Entities;
use AnthraxisBR\FastWork\tasks\TasksReceiver;

class EntitiesDefault extends  TasksReceiver
{

    public function createMultipleEntities(Entities $entities, $data){

        $entities->create($data);

    }
    public function insertUser(UsersEntity $UsersEntity, $data)
    {

    }

}