<?php


namespace App\actions;


use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\tasks\TasksManager;
use database\entity\Users;


class AsyncActions extends Actions
{
    public function asyncCall(TasksManager $tasksManager, Users $users, Request $request)
    {

        $this->async(
            $tasksManager = $tasksManager,
            $class = $users,
            $function = 'create',
            $args = [$request->getData()] ,
            function ($item){
                var_dump('OK');
            }
        );

        echo 'call';

        sleep(5);

        echo 'end';
    }
}