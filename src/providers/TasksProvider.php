<?php

namespace AnthraxisBR\SwooleFW\providers;


use AnthraxisBR\SwooleFW\database\Entitites;
use AnthraxisBR\SwooleFW\providers\BaseProvider;
use AnthraxisBR\SwooleFW\traits\Injection;

class TasksProvider extends BaseProvider
{

    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\SwooleFW\tasks\TasksManager';
        $this->name = 'tasks';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}