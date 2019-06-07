<?php


namespace App\actions;


use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\Async\Promisse;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\tasks\TasksManager;
use database\entity\Users;

class Teste {

    public function sum($a, $b)
    {
        return $a + $b;
    }
}

class AsyncAction extends Actions
{
    public function asyncCall(TasksManager $tasksManager, Users $users)
    {
        (new Promisse( function($body){

                $teste = new Teste();

                sleep(1);
                echo $teste->sum(1,6);
                sleep(1);
                echo $teste->sum(6, 8);
                sleep(1);
                echo $teste->sum(1, 8);
        }));

        return "sendo assíncrono";
    }
}