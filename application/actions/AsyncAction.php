<?php


namespace App\actions;


use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\Async\AsyncResponse;
use AnthraxisBR\SwooleFW\Async\Promisse;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\tasks\TasksManager;
use database\entity\Users;

class Teste {

    public function sum($a, $b)
    {
        sleep(1);
        var_dump('sum');
        return $a + $b;
    }
}

class AsyncAction extends Actions
{
    public function asyncCall()
    {
        return (new Promisse( function(AsyncResponse $response){
                return $response->resp(Teste::sum(1,2));
        }))->exec();

    }
}