<?php


namespace App\Tasks;


use AnthraxisBR\FastWork\Database\Entities;
use AnthraxisBR\FastWork\Tasks\TasksReceiver;

class EntitiesDefault extends  TasksReceiver
{

    public function createMultipleEntities(Entities $entities, $data){

        $entities->create($data);

    }
    public function insertUser(UsersEntity $UsersEntity, $data)
    {

    }

}