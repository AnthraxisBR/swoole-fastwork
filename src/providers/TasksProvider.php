<?php

namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entitites;
use AnthraxisBR\FastWork\providers\BaseProvider;
use AnthraxisBR\FastWork\traits\Injection;

class TasksProvider extends BaseProvider
{

    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\FastWork\tasks\TasksManager';
        $this->name = 'tasks';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}