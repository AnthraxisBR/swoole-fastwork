<?php


namespace App\tasks;


use AnthraxisBR\SwooleFW\database\Entities;
use AnthraxisBR\SwooleFW\tasks\TasksReceiver;

class EntitiesDefault extends  TasksReceiver
{

    public function createMultipleEntities(Entities $entities, $data){

        $entities->create($data);

    }
    public function insertUser(UsersEntity $UsersEntity, $data)
    {

    }

}