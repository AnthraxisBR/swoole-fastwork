<?php


namespace App\actions;


use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\Async\AsyncResponse;
use AnthraxisBR\SwooleFW\Async\Promisse;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\tasks\TasksManager;
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