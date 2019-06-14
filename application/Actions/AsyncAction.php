<?php


namespace App\Actions;


use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\Async\AsyncResponse;
use AnthraxisBR\FastWork\Async\Promisse;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Tasks\TasksManager;
use Utils\Entities\Users;


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