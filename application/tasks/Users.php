<?php

namespace App\tasks;


use AnthraxisBR\FastWork\tasks\TasksReceiver;

use database\entity\Users as UsersEntity;

class Users extends  TasksReceiver
{

    public function createMultipleUsers(UsersEntity $UsersEntity, $data){

        $tasks = [];
        foreach ($data['data'] as $item){
            $tasks[] = \Closure::bind($UsersEntity->willCreate($data));
        }

        $data->serv->taskWaitMulti($tasks, 1);
    }
    public function insertUser(UsersEntity $UsersEntity, $data)
    {

    }

}