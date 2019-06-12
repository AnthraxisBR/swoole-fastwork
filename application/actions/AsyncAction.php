<?php


namespace App\actions;


use AnthraxisBR\FastWork\actions\Actions;
use AnthraxisBR\FastWork\Async\AsyncResponse;
use AnthraxisBR\FastWork\Async\Promisse;
use AnthraxisBR\FastWork\http\Request;
use AnthraxisBR\FastWork\tasks\TasksManager;
use database\entity\Users;


class AsyncAction extends Actions
{
    public function asyncCall(TasksManager $tasksManager, Users $users, Request $request)
    {

        $data = $users->willCreate($tasksManager, $request);

        $this->taskWaitMulti($data);

 /*       return (new Promisse( function(AsyncResponse $response){
                return $response->resp(Teste::sum(1,2));
        }))->exec();*/

    }
}