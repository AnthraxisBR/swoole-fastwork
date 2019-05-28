<?php

namespace App\tasks;


use AnthraxisBR\SwooleFW\tasks\TasksReceiver;

use database\entity\Users as UsersEntity;

class Users extends  TasksReceiver
{
    public function insertUser(UsersEntity $UsersEntity, $data)
    {

    }

}